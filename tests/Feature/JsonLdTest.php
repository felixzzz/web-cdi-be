<?php

use App\Models\Article\Article;
use App\Models\OurBusiness\OurBusiness;
use App\Models\Utility\Preference;
use App\Enums\PreferenceKey;
use Illuminate\Support\Facades\App;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('static page preferences contain seeded json_ld keys', function () {
    // Seed new preference keys
    $keys = [
        'json_ld_homepage',
        'json_ld_about_us',
        'json_ld_governance',
        'json_ld_sustainability',
        'json_ld_contact_us',
        'json_ld_our_business',
    ];

    foreach ($keys as $key) {
        $enumCase = PreferenceKey::tryFrom($key);
        expect($enumCase)->not->toBeNull();
        
        $pref = Preference::firstOrCreate(['key' => $key], [
            'type' => $enumCase->type(),
            'title_en' => 'JSON-LD Schema',
            'title_id' => 'Skema JSON-LD',
            'content_en' => '{"@context": "https://schema.org"}',
            'content_id' => '{"@context": "https://schema.org", "lang": "id"}',
        ]);

        expect($pref->exists)->toBeTrue();
    }
});

test('article model correctly localizes json_ld field', function () {
    $article = Article::create([
        'thumbnail' => 'dummy.jpg',
        'category' => \App\Enums\ArticleCategory::Blog,
        'datetime' => now(),
        'title_en' => 'En title',
        'title_id' => 'Id title',
        'content_en' => 'En content',
        'content_id' => 'Id content',
        'json_ld' => '{"type": "Article", "lang": "en"}',
        'json_ld_id' => '{"type": "Article", "lang": "id"}',
        'status' => 1,
    ]);

    App::setLocale('en');
    expect($article->json_ld)->toBe('{"type": "Article", "lang": "en"}');

    App::setLocale('id');
    expect($article->json_ld)->toBe('{"type": "Article", "lang": "id"}');
});

test('our business model correctly localizes json_ld field', function () {
    $business = OurBusiness::create([
        'type' => 'energy',
        'title_en' => 'Energy',
        'title_id' => 'Energi',
        'description_en' => 'Energy desc',
        'description_id' => 'Energi desc',
        'json_ld_en' => '{"type": "Service", "lang": "en"}',
        'json_ld_id' => '{"type": "Service", "lang": "id"}',
    ]);

    App::setLocale('en');
    expect($business->json_ld)->toBe('{"type": "Service", "lang": "en"}');

    App::setLocale('id');
    expect($business->json_ld)->toBe('{"type": "Service", "lang": "id"}');
});
