<?php

use App\Enums\AdditionalFileType;
use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Models\User;
use App\Models\Utility\AdditionalFile;
use App\Models\Utility\Preference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('governance preference keys include governance_guideline and governance_guideline_show', function () {
    $keys = PreferenceKey::getAllGovernanceKey();

    expect($keys)->toContain(PreferenceKey::governance_guideline->value);
    expect($keys)->toContain(PreferenceKey::governance_guideline_show->value);

    expect(PreferenceKey::governance_guideline->type())->toBe(PreferenceType::TextContent);
    expect(PreferenceKey::governance_guideline_show->type())->toBe(PreferenceType::TextContent);
});

test('additional file type enum has governance_guideline', function () {
    expect(AdditionalFileType::GovernanceGuideline->value)->toBe('governance_guideline');
    expect(AdditionalFileType::GovernanceGuideline->word())->toBe('Guideline');
});

test('utility governance endpoint returns governance_guideline and governance_guideline_show', function () {
    Preference::create([
        'key' => PreferenceKey::governance_guideline->value,
        'type' => PreferenceType::TextContent,
        'title_en' => 'Guideline',
        'title_id' => 'Panduan',
        'content_en' => '<p>Guideline content EN</p>',
        'content_id' => '<p>Guideline content ID</p>',
    ]);

    Preference::create([
        'key' => PreferenceKey::governance_guideline_show->value,
        'type' => PreferenceType::TextContent,
        'title_en' => 'Disclaimer',
        'title_id' => 'Penafian',
        'content_en' => 'show',
        'content_id' => '',
    ]);

    $response = $this->getJson(route('api.utility.governance'));
    $response->assertStatus(200);

    $data = $response->json();
    expect($data)->toHaveKey('governance_guideline');
    expect($data)->toHaveKey('governance_guideline_show');
    expect($data['governance_guideline']['title_en'])->toBe('Guideline');
    expect($data['governance_guideline']['title_id'])->toBe('Panduan');
    expect($data['governance_guideline_show']['content_en'])->toBe('show');
});

test('utility additional file endpoint returns governance_guideline files when show_on_governance is 1', function () {
    // Clear any seeded additional files
    AdditionalFile::query()->delete();

    AdditionalFile::create([
        'type' => AdditionalFileType::GovernanceGuideline,
        'unique_key' => 'affiliate_transaction_implementation_guidelines',
        'name_en' => 'Affiliate Transaction Implementation Guidelines',
        'name_id' => 'Pedoman Pelaksanaan Transaksi Afiliasi',
        'show_on_governance' => 1,
        'sort' => 1,
    ]);

    AdditionalFile::create([
        'type' => AdditionalFileType::GovernanceGuideline,
        'unique_key' => 'hidden_guideline',
        'name_en' => 'Hidden Guideline',
        'name_id' => 'Panduan Tersembunyi',
        'show_on_governance' => 0,
        'sort' => 2,
    ]);

    $response = $this->getJson(route('api.utility.additional-file', ['type' => 'governance_guideline']));
    $response->assertStatus(200);

    $items = $response->json();
    expect($items)->toHaveCount(1);
    expect($items[0]['name_en'])->toBe('Affiliate Transaction Implementation Guidelines');
    expect($items[0]['name_id'])->toBe('Pedoman Pelaksanaan Transaksi Afiliasi');
});

test('admin can view governance content page with guideline tab', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.page-management.governance-content.index'));
    $response->assertStatus(200);
    $response->assertSee('Guideline');
    $response->assertSee('governance_guideline_title_en');
    $response->assertSee('governance_guideline_title_id');
    $response->assertSee('governance_guideline_show_content_en');
});

test('admin can update governance guideline content', function () {
    $user = User::factory()->create();

    $payload = [
        'governance_guideline_title_en' => 'Corporate Guidelines',
        'governance_guideline_title_id' => 'Panduan Perusahaan',
        'governance_guideline_content_en' => '<p>Updated guidelines</p>',
        'governance_guideline_content_id' => '<p>Panduan diperbarui</p>',
        'governance_guideline_show_content_en' => 'show',
    ];

    $response = $this->actingAs($user)->post(route('admin.page-management.governance-content.store'), $payload);
    $response->assertRedirect(route('admin.page-management.governance-content.index'));

    $pref = Preference::where('key', PreferenceKey::governance_guideline->value)->first();
    expect($pref)->not->toBeNull();
    expect($pref->title_en)->toBe('Corporate Guidelines');
    expect($pref->title_id)->toBe('Panduan Perusahaan');
    expect($pref->content_en)->toBe('<p>Updated guidelines</p>');
});

test('admin can manage governance files of type governance_guideline', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.page-management.governance-files.index', ['type' => 'governance_guideline']));
    $response->assertStatus(200);

    // Create a governance guideline file
    $fileEn = UploadedFile::fake()->create('guidelines_en.pdf', 100, 'application/pdf');
    $fileId = UploadedFile::fake()->create('guidelines_id.pdf', 100, 'application/pdf');

    $postData = [
        'unique_key' => 'new_affiliate_transaction_guidelines',
        'name_en' => 'Affiliate Transaction Implementation Guidelines',
        'name_id' => 'Pedoman Pelaksanaan Transaksi Afiliasi',
        'show_on_governance' => 1,
        'file_en' => $fileEn,
        'file_id' => $fileId,
    ];

    $createResponse = $this->actingAs($user)->post(
        route('admin.page-management.governance-files.store', ['type' => 'governance_guideline']),
        $postData
    );
    $createResponse->assertRedirect(route('admin.page-management.governance-files.index', ['type' => 'governance_guideline']));

    $file = AdditionalFile::where('unique_key', 'new_affiliate_transaction_guidelines')->first();
    expect($file)->not->toBeNull();
    expect($file->name_en)->toBe('Affiliate Transaction Implementation Guidelines');
    expect($file->name_id)->toBe('Pedoman Pelaksanaan Transaksi Afiliasi');
    expect($file->type)->toBe(AdditionalFileType::GovernanceGuideline);
    expect($file->show_on_governance)->toBe(1);

    // Update
    $updateResponse = $this->actingAs($user)->put(
        route('admin.page-management.governance-files.update', ['governance_file' => $file->ulid, 'type' => 'governance_guideline']),
        [
            'name_en' => 'Updated Affiliate Guidelines',
            'name_id' => 'Pedoman Afiliasi Diperbarui',
            'show_on_governance' => 1,
        ]
    );
    $updateResponse->assertRedirect(route('admin.page-management.governance-files.index', ['type' => 'governance_guideline']));
    expect($file->fresh()->name_en)->toBe('Updated Affiliate Guidelines');

    // Delete
    $deleteResponse = $this->actingAs($user)->delete(
        route('admin.page-management.governance-files.destroy', ['governance_file' => $file->ulid, 'type' => 'governance_guideline'])
    );
    $deleteResponse->assertRedirect(route('admin.page-management.governance-files.index', ['type' => 'governance_guideline']));
    expect(AdditionalFile::where('ulid', $file->ulid)->exists())->toBeFalse();
});
