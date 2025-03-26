<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Services\Seeder\ColorSeederService;

class AddColorSeeder extends Seeder
{
    /**
     * Constructor.
     *
     * @param ColorSeederService $colorSeederService Inject Service
     */
    public function __construct(
        protected ColorSeederService $colorSeederService
    ) {
    }

    // Color details
    public $colorsArr = [
        [
            'name' => 'Red',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'Black',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'White',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'Yellow',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'Pink',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'Rose Gold',
            'color_code' => '#ffffff',
            'status' => 1
        ],
        [
            'name' => 'Green',
            'color_code' => '#ffffff',
            'status' => 1
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seederResponse = $this->colorSeederService->createColors(
            $this->colorsArr
        );
        $this->command->info("Colors added successfully!");
        return true;
    }
}
