<?php

use Illuminate\Database\Seeder;

class BuildingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildingcategories')->insert([
            'name' => "行政",
            'building_id' => "1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('buildingcategories')->insert([
            'name' => "系館",
            'building_id' => "2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('buildingcategories')->insert([
            'name' => "中大景點",
            'building_id' => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('buildingcategories')->insert([
            'name' => "運動",
            'building_id' => "4",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('buildingcategories')->insert([
            'name' => "飲食",
            'building_id' => "5",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('buildingcategories')->insert([
            'name' => "住宿",
            'building_id' => "6",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
