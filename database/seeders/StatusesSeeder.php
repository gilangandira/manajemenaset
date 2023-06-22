<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name'=>'Normal',
        ]);
        DB::table('statuses')->insert([
            'name'=>'Rusak',
        ]);
        DB::table('statuses')->insert([
            'name'=>'Hilang',
        ]);
    }
}
