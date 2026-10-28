<?php

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Models\Utility\Country;
use App\Models\Utility\Inbox;
use App\Models\Utility\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

uses(RefreshDatabase::class);

test('contact us api validates topic_id and rejects non-existent topic (topic_id: 0) with 422 without SQL disclosure', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => 0, // Invalid topic_id (PoC from security audit)
        'message' => 'Hello, this is a test inquiry.',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['topic_id']);

    // Ensure NO raw database, table, or SQL query information is disclosed
    $content = $response->getContent();
    expect($content)->not->toContain('SQLSTATE')
        ->and($content)->not->toContain('web_cdi_compro')
        ->and($content)->not->toContain('inboxes_topic_id_foreign')
        ->and($content)->not->toContain('Integrity constraint violation');
});

test('contact us api validates country_id and rejects non-existent country with 422', function () {
    $topic = Topic::create([
        'name_en' => 'General Inquiry',
        'name_id' => 'Pertanyaan Umum',
        'type' => TopicType::ContactUs,
    ]);

    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => 99999, // Non-existent country
        'topic_id' => $topic->id,
        'message' => 'Hello, this is a test inquiry.',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['country_id']);
    expect($response->getContent())->not->toContain('SQLSTATE');
});

test('contact us api validates data types and formats (email, malformed strings)', function () {
    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => ['not-a-string'],
        'last_name' => 'Doe',
        'email' => 'not-an-email',
        'country_id' => 'not-an-integer',
        'topic_id' => 'not-an-integer',
        'message' => 'Valid message',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['first_name', 'email', 'country_id', 'topic_id']);
    expect($response->getContent())->not->toContain('SQLSTATE');
});

test('contact us api rejects topics that belong to a different type (e.g. whistleblowing)', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $whistleblowingTopic = Topic::create([
        'name_en' => 'Fraud Report',
        'name_id' => 'Laporan Kecurangan',
        'type' => TopicType::Whistleblowing,
    ]);

    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => $whistleblowingTopic->id, // Belongs to whistleblowing, not contact_us
        'message' => 'Hello, this is a test inquiry.',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['topic_id']);
});

test('contact us api successfully stores valid submission', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $topic = Topic::create([
        'name_en' => 'General Inquiry',
        'name_id' => 'Pertanyaan Umum',
        'type' => TopicType::ContactUs,
    ]);

    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => $topic->id,
        'message' => 'Hello, this is a legitimate contact message.',
    ]);

    $response->assertStatus(201);
    $response->assertJson([
        'success' => true,
    ]);

    $this->assertDatabaseHas('inboxes', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => $topic->id,
        'type' => TopicType::ContactUs->value,
    ]);
});

test('contact us api returns generic 500 error and logs error internally if action throws', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $topic = Topic::create([
        'name_en' => 'General Inquiry',
        'name_id' => 'Pertanyaan Umum',
        'type' => TopicType::ContactUs,
    ]);

    $mockAction = Mockery::mock(InboxAction::class);
    $mockAction->shouldReceive('handle')
        ->once()
        ->andThrow(new \PDOException('Simulated internal SQL error with confidential database details'));
    $this->app->instance(InboxAction::class, $mockAction);

    Log::spy();

    $response = $this->postJson(route('contact-us.storeContacUsApi'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => $topic->id,
        'message' => 'Test message',
    ]);

    $response->assertStatus(500);
    $response->assertJson([
        'success' => false,
        'message' => 'Failed to submit data. Please try again later.',
    ]);

    Log::shouldHaveReceived('error')->once();

    $content = $response->getContent();
    expect($content)->not->toContain('Simulated internal SQL error');
});

test('governance whistleblowing api validates topic_id and rejects non-existent topic (topic_id: 0) with 422', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $response = $this->postJson(route('governance.apiWhistleblowingStore'), [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => 0,
        'message' => 'Whistleblowing message.',
    ]);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['topic_id']);
    expect($response->getContent())->not->toContain('SQLSTATE');
});

test('web contact us store route returns generic error flash on exception', function () {
    $country = Country::create([
        'name' => 'Indonesia',
        'code' => 'ID',
    ]);

    $topic = Topic::create([
        'name_en' => 'General Inquiry',
        'name_id' => 'Pertanyaan Umum',
        'type' => TopicType::ContactUs,
    ]);

    $mockAction = Mockery::mock(InboxAction::class);
    $mockAction->shouldReceive('handle')
        ->once()
        ->andThrow(new \PDOException('Simulated internal SQL error with confidential database details'));
    $this->app->instance(InboxAction::class, $mockAction);

    Log::spy();

    $response = $this->post(route('contact-us.store'), [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'country_id' => $country->id,
        'topic_id' => $topic->id,
        'message' => 'Test message',
    ]);

    $response->assertSessionHas('error', 'Failed to submit data. Please try again later.');
    expect(session('error'))->not->toContain('Simulated internal SQL error');
    Log::shouldHaveReceived('error')->once();
});

