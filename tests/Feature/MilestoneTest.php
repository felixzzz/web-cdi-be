<?php

use App\Models\AboutUs\Milestone;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns milestones sorted by year and priority', function () {
    // Create milestones in scrambled order
    Milestone::create([
        'year' => 2024,
        'priority' => 2,
        'content_en' => '2024 second',
        'content_id' => '2024 second id',
    ]);

    Milestone::create([
        'year' => 2023,
        'priority' => 1,
        'content_en' => '2023 first',
        'content_id' => '2023 first id',
    ]);

    Milestone::create([
        'year' => 2024,
        'priority' => 1,
        'content_en' => '2024 first',
        'content_id' => '2024 first id',
    ]);

    $response = $this->getJson(route('api.utility.milestones'));

    $response->assertStatus(200);

    $data = $response->json();

    expect($data)->toHaveCount(3);
    
    // Assert 2023 comes first
    expect($data[0]['year'])->toEqual(2023);
    expect($data[0]['content_en'])->toEqual('2023 first');

    // Assert 2024 with priority 1 comes second
    expect($data[1]['year'])->toEqual(2024);
    expect($data[1]['priority'])->toEqual(1);
    expect($data[1]['content_en'])->toEqual('2024 first');

    // Assert 2024 with priority 2 comes third
    expect($data[2]['year'])->toEqual(2024);
    expect($data[2]['priority'])->toEqual(2);
    expect($data[2]['content_en'])->toEqual('2024 second');
});
