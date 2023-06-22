<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Access Point',
            'slug' =>'access-point',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Router',
            'slug' =>'router',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Switch',
            'slug' =>'switch',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Firewall',
            'slug' =>'firewall',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Wireless Controller',
            'slug' =>'wireless-controller',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Ethernet Switch',
            'slug' =>'ethernet-switch',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Network Access Controller',
            'slug' =>'network-access-controller',
        ]);
        

    }
}
