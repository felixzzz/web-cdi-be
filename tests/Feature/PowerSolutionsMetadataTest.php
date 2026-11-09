<?php

use App\Enums\PreferenceKey;
use App\Models\OurBusiness\OurBusiness;
use App\Models\Utility\Preference;
use App\Repositories\Data\OurBusinessRepository;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Support\Facades\App;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('meta_our_business_energy preference returns power solutions metadata', function () {
    Preference::updateOrCreate(
        ['key' => PreferenceKey::meta_our_business_energy->value],
        [
            'type' => PreferenceKey::meta_our_business_energy->type(),
            'title_en' => 'Power Solutions | Chandra Daya Investasi',
            'title_id' => 'Solusi Daya | Chandra Daya Investasi',
            'content_en' => "CDI Group's energy infrastructure through KCE delivers power supply, electricity services, and renewable energy for industry and the public.",
            'content_id' => "Solusi infrastruktur energi CDI Group melalui KCE menghadirkan penyediaan listrik, layanan kelistrikan, dan energi terbarukan untuk industri & publik.",
        ]
    );

    $prefRepo = new PreferenceRepository();

    App::setLocale('en');
    $seoMetaEn = $prefRepo->getAllContentPage('', PreferenceKey::getSeoMetaKeys());
    expect($seoMetaEn->meta_our_business_energy->title)->toBe('Power Solutions | Chandra Daya Investasi');

    App::setLocale('id');
    $seoMetaId = $prefRepo->getAllContentPage('', PreferenceKey::getSeoMetaKeys());
    expect($seoMetaId->meta_our_business_energy->title)->toBe('Solusi Daya | Chandra Daya Investasi');
});

test('our business detail for energy or power returns power title and meta title', function () {
    OurBusiness::create([
        'type' => 'energy',
        'title_en' => 'Power',
        'title_id' => 'Daya',
        'meta_title_en' => 'Power Solutions | Chandra Daya Investasi',
        'meta_title_id' => 'Solusi Daya | Chandra Daya Investasi',
        'meta_description_en' => 'Description EN',
        'meta_description_id' => 'Description ID',
    ]);

    $repo = new OurBusinessRepository();

    App::setLocale('en');
    $detailEn = $repo->detailByType('power');
    expect($detailEn->title)->toBe('Power')
        ->and($detailEn->meta_title)->toBe('Power Solutions | Chandra Daya Investasi');

    App::setLocale('id');
    $detailId = $repo->detailByType('power');
    expect($detailId->title)->toBe('Daya')
        ->and($detailId->meta_title)->toBe('Solusi Daya | Chandra Daya Investasi');
});

