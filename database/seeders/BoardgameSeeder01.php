<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // ← ADD THIS

class BoardgameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    DB::table('boardgames')->insert([
        [
            'title' => 'Silencio',
            'author' => 'Sebastiem Caiveau',
            'price' => 7,
            'publish_date' => '2020-01-01',
            'url' => 'https://example.com/silencio',
            'status' => 'active',
            'availabilityYN' => true,
            'inventoryCount' => 12,
            'AgeRange' => '10+',
            'NoOfPlayers' => '2-4',
            'Theme' => 'Mystery',
            'Language' => 'English',
        ],
        [
            'title' => 'Patchwork',
            'author' => 'Uwe Rosenberg',
            'price' => 15,
            'publish_date' => '2014-05-10',
            'url' => 'https://example.com/patchwork',
            'status' => 'active',
            'availabilityYN' => true,
            'inventoryCount' => 8,
            'AgeRange' => '8+',
            'NoOfPlayers' => '2',
            'Theme' => 'Crafting',
            'Language' => 'English',
        ],
        [
            'title' => 'Cafe Fatal',
            'author' => 'Brett J. Gilbert',
            'price' => 8,
            'publish_date' => '2017-03-15',
            'url' => 'https://example.com/cafe-fatal',
            'status' => 'active',
            'availabilityYN' => true,
            'inventoryCount' => 5,
            'AgeRange' => '7+',
            'NoOfPlayers' => '3-6',
            'Theme' => 'Food',
            'Language' => 'English',
        ],
        [
            'title' => 'Overload',
            'author' => 'Wolfand Riedl',
            'price' => 20,
            'publish_date' => '2019-09-01',
            'url' => 'https://example.com/overload',
            'status' => 'active',
            'availabilityYN' => true,
            'inventoryCount' => 10,
            'AgeRange' => '12+',
            'NoOfPlayers' => '2-5',
            'Theme' => 'Adventure',
            'Language' => 'English',
        ],
        [
            'title' => 'Catan',
            'author' => 'Klaus Teuber',
            'price' => 25,
            'publish_date' => '1995-01-01',
            'url' => 'https://example.com/catan',
            'status' => 'active',
            'availabilityYN' => true,
            'inventoryCount' => 20,
            'AgeRange' => '10+',
            'NoOfPlayers' => '3-4',
            'Theme' => 'Strategy',
            'Language' => 'English',
        ],
    ]);
}
}
