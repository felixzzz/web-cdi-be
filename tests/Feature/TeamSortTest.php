<?php

use App\Models\Data\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns teams sorted by sort column ascending', function () {
    Team::create([
        'type' => 'bod',
        'name' => 'Director Two',
        'position' => 'Director',
        'sort' => 2,
        'image' => 'director2.jpg',
        'image_hero' => 'director2_hero.png',
        'description_en' => 'Desc EN 2',
        'description_id' => 'Desc ID 2',
    ]);

    Team::create([
        'type' => 'bod',
        'name' => 'Director One',
        'position' => 'President Director',
        'sort' => 1,
        'image' => 'director1.jpg',
        'image_hero' => 'director1_hero.png',
        'description_en' => 'Desc EN 1',
        'description_id' => 'Desc ID 1',
    ]);

    Team::create([
        'type' => 'bod',
        'name' => 'Director Three',
        'position' => 'Director',
        'sort' => 3,
        'image' => 'director3.jpg',
        'image_hero' => 'director3_hero.png',
        'description_en' => 'Desc EN 3',
        'description_id' => 'Desc ID 3',
    ]);

    $response = $this->getJson(route('api.utility.teams', ['type' => 'bod']));

    $response->assertStatus(200);

    $data = $response->json();

    expect($data)->toHaveCount(3);
    expect($data[0]['name'])->toEqual('Director One');
    expect($data[0]['sort'])->toEqual(1);

    expect($data[1]['name'])->toEqual('Director Two');
    expect($data[1]['sort'])->toEqual(2);

    expect($data[2]['name'])->toEqual('Director Three');
    expect($data[2]['sort'])->toEqual(3);
});

it('can update teams sort order via admin teams sort route', function () {
    $user = User::factory()->create();

    $team1 = Team::create([
        'type' => 'bod',
        'name' => 'Director A',
        'position' => 'Director',
        'sort' => 1,
        'image' => 'a.jpg',
        'image_hero' => 'a_hero.png',
        'description_en' => 'Desc A',
        'description_id' => 'Desc A ID',
    ]);

    $team2 = Team::create([
        'type' => 'bod',
        'name' => 'Director B',
        'position' => 'Director',
        'sort' => 2,
        'image' => 'b.jpg',
        'image_hero' => 'b_hero.png',
        'description_en' => 'Desc B',
        'description_id' => 'Desc B ID',
    ]);

    $response = $this->actingAs($user)->postJson(route('admin.teams.sort'), [
        'order' => [
            ['id' => $team1->id, 'sort' => 5],
            ['id' => $team2->id, 'sort' => 1],
        ],
    ]);

    $response->assertStatus(200);
    $response->assertJson(['success' => true]);

    expect($team1->fresh()->sort)->toEqual(5);
    expect($team2->fresh()->sort)->toEqual(1);
});
