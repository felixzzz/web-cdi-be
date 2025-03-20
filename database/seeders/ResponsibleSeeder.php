<?php

namespace Database\Seeders;

use App\Models\Sustainability\Responsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'R',
                'rotate' => 5,
            ],
            [
                'key' =>  'E',
                'rotate' => -27,
            ],
            [
                'key' =>  'S',
                'rotate' => -62,
            ],
            [
                'key' =>  'P',
                'rotate' => -94,
            ],
            [
                'key' =>  'O',
                'rotate' => -130,
            ],
            [
                'key' =>  'N',
                'rotate' => -162,
            ],
            [
                'key' =>  'S',
                'rotate' => -195,
            ],
            [
                'key' =>  'I',
                'rotate' => -230,
            ],
            [
                'key' =>  'B',
                'rotate' => -260,
            ],
            [
                'key' =>  'L',
                'rotate' => -292,
            ],
            [
                'key' =>  'E',
                'rotate' => -323,
            ],
        ];

        $i = 1;
        foreach ($data as $key => $value) {
            Responsible::create([
                ...$value,
                'sort' => $i
            ]);
            $i++;
        }
    }
}
