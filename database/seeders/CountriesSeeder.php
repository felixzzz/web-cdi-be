<?php

namespace Database\Seeders;

use App\Models\Utility\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path("json/countries.json");
        $countries = json_decode(File::get($jsonPath), true);

        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'code' => $country['code'],
            ]);
        }
    }
}
