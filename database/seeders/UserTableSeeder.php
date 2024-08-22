<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stores')->insert([
            ['id' => 1, 
            'storesname' => 'name', 
            'address' => "函館", 
            'phone_number' => '00000000',
            "opentime" => "10:00",
            "closetime" => "19:00",
            "homepage_url" => "https://",
            "genre" => "居酒屋",
            "photo" => "https://farm3.static.flickr.com/2469/4020702654_ac0a6d638e_o.jpg",#3688×2592 jpeg
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],

            ['id' => 2, 
            'storesname' => 'name2', 
            'address' => "五稜郭", 
            'phone_number' => '111111111',
            "opentime" => "9:00",
            "closetime" => "18:00",
            "homepage_url" => "https://",
            "genre" => "イタリアン",
            "photo" => "https://farm3.static.flickr.com/2693/4053077192_52b2165fe8_o.jpg",#jpeg
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('closeddays')->insert([
            ['id' => 1, 'week' => '月', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'week' => '火', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'week' => '水', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'week' => '木', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'week' => '金', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'week' => '土', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'week' => '日', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'week' => '不定休', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        
        DB::table('tags')->insert([
            ['id' => 1, 'tagname' => 'イカ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'tagname' => 'ブリ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'tagname' => 'エビ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        DB::table('stores_closeddays')->insert([
            ['id' => 1, 'stores_id' => 1, 'closeddays_id' => 1],
            ['id' => 2, 'stores_id' => 1, 'closeddays_id' => 2]
        ]);

        DB::table('stores_tags')->insert([
            ['id' => 1, 'stores_id' => 1, 'tags_id' => 1],
            ['id' => 2, 'stores_id' => 1, 'tags_id' => 2],
            ['id' => 3, 'stores_id' => 2, 'tags_id' => 2]
        ]);

    }
}
