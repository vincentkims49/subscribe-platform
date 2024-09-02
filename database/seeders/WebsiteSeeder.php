<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    public function run()
    {
        $websites = [
            ['name' => 'TechCrunch', 'url' => 'https://techcrunch.com'],
            ['name' => 'The Verge', 'url' => 'https://www.theverge.com'],
            ['name' => 'Wired', 'url' => 'https://www.wired.com'],
            ['name' => 'Ars Technica', 'url' => 'https://arstechnica.com'],
            ['name' => 'Engadget', 'url' => 'https://www.engadget.com'],
        ];

        foreach ($websites as $website) {
            Website::updateOrCreate(
                ['url' => $website['url']],  // The criteria to check if the record exists
                $website  // The data to update or create
            );
        }
    }
}