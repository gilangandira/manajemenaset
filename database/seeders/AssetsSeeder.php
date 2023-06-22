<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([
            [
                'category_id' => 1,
                'nama_aset' => 'AP TO Mauk 1',
                'status_id' => 2,
                'type' => 'Networking Equipment',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat ipsum quis atque modi dolorum quisquam debitis optio, voluptas numquam repudiandae dignissimos consequuntur porro. Expedita debitis placeat laborum, dolorem voluptatibus corrupti!',
                'location' => 'carolina',
                'serial_number' => '125416121',
                'price' => '1500000',
            ],
            [
                'category_id' => 1,
                'nama_aset' => 'AP TO Mauk 2',
                'status_id' => 2,
                'type' => 'Networking Equipment',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat ipsum quis atque modi dolorum quisquam debitis optio, voluptas numquam repudiandae dignissimos consequuntur porro. Expedita debitis placeat laborum, dolorem voluptatibus corrupti!',
                'location' => 'carolina',
                'serial_number' => '987654321',
                'price' => '2500000',
            ],
            [
                'category_id' => 1,
                'nama_aset' => 'AP TO Mauk 10',
                'status_id' => 2,
                'type' => 'Networking Equipment',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat ipsum quis atque modi dolorum quisquam debitis optio, voluptas numquam repudiandae dignissimos consequuntur porro. Expedita debitis placeat laborum, dolorem voluptatibus corrupti!',
                'location' => 'carolina',
                'serial_number' => '123456789',
                'price' => '1800000',
            ],
        ]);
        
        
        
    }
}
