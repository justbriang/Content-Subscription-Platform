<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $websites = [
            [
                'name' => 'unisev',
                'url' => 'www.unisev.com'
            ],
            [
                'name' => 'inisev',
                'url' => 'www.inisev.com'
            ],
            [
                'name' => 'google',
                'url' => 'www.google.com'
            ],
            [
                'name' => 'facebook',
                'url' => 'www.facebook.com'
            ],
        ];

        Website::insert($websites);
    }
}
