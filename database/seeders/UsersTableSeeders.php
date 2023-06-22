<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Asera',
            'email'=>'aserazeff@gmail.com',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name'=>'Gilang',
            'email'=>'test1@gmail.com',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name'=>'Andy',
            'email'=>'test2@gmail.com',
            'password'=>Hash::make('123456')
        ]);
        
    }
}
