<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'kelamin'=>'Laki-Laki',
            'agama'=>'Islam',
            'jabatan'=>'Teknisi',
            'alamat'=>'Perum Permata Sepatan Blok B6 A no 1',
        ]);
        DB::table('profiles')->insert([
            'kelamin'=>'Laki-Laki',
            'agama'=>'Islam',
            'jabatan'=>'Teknisi',
            'alamat'=>'Perum Permata Sepatan Blok B6 A no 1',
        ]);
        DB::table('profiles')->insert([
            'kelamin'=>'Laki-Laki',
            'agama'=>'Islam',
            'jabatan'=>'Teknisi',
            'alamat'=>'Perum Permata Sepatan Blok B6 A no 1',
        ]);
        DB::table('profiles')->insert([
            'kelamin'=>'Laki-Laki',
            'agama'=>'Islam',
            'jabatan'=>'Teknisi',
            'alamat'=>'Perum Permata Sepatan Blok B6 A no 1',
        ]);
    }
}
