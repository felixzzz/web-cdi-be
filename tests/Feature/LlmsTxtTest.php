<?php

use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Helpers\LlmsDefaultContent;
use App\Models\Utility\Preference;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('llms_txt and llms_full_txt preference keys exist and use TextContent type', function () {
    $llmsTxt = PreferenceKey::tryFrom('llms_txt');
    $llmsFullTxt = PreferenceKey::tryFrom('llms_full_txt');

    expect($llmsTxt)->not->toBeNull()
        ->and($llmsTxt->type())->toBe(PreferenceType::TextContent)
        ->and($llmsFullTxt)->not->toBeNull()
        ->and($llmsFullTxt->type())->toBe(PreferenceType::TextContent);
});

test('api utility llms endpoint returns default content when preferences are empty and custom content when updated', function () {
    // 1. When empty, fallback content is returned
    $response = $this->getJson(route('api.utility.llms'));
    $response->assertOk()
        ->assertJson([
            'llms_txt' => LlmsDefaultContent::llmsTxt(),
            'llms_full_txt' => LlmsDefaultContent::llmsFullTxt(),
        ]);

    // 2. When updated in DB, custom content is returned
    Preference::updateOrCreate(
        ['key' => PreferenceKey::llms_txt->value],
        [
            'type' => PreferenceKey::llms_txt->type(),
            'title_en' => 'llms.txt',
            'content_en' => "# Custom CDI llms.txt\n\n> Custom summary.",
        ]
    );

    Preference::updateOrCreate(
        ['key' => PreferenceKey::llms_full_txt->value],
        [
            'type' => PreferenceKey::llms_full_txt->type(),
            'title_en' => 'llms-full.txt',
            'content_en' => "# Custom CDI llms-full.txt\n\nFull custom details.",
        ]
    );

    $updatedResponse = $this->getJson(route('api.utility.llms'));
    $updatedResponse->assertOk()
        ->assertJson([
            'llms_txt' => "# Custom CDI llms.txt\n\n> Custom summary.",
            'llms_full_txt' => "# Custom CDI llms-full.txt\n\nFull custom details.",
        ]);
});

test('web routes /llms.txt and /llms-full.txt serve plain text content', function () {
    Preference::updateOrCreate(
        ['key' => PreferenceKey::llms_txt->value],
        [
            'type' => PreferenceKey::llms_txt->type(),
            'content_en' => "# Web Route llms.txt",
        ]
    );

    $res1 = $this->get('/llms.txt');
    $res1->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=utf-8')
        ->assertSee('# Web Route llms.txt', false);

    $res2 = $this->get('/llms-full.txt');
    $res2->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=utf-8')
        ->assertSee('PT Chandra Daya Investasi Tbk', false);
});
