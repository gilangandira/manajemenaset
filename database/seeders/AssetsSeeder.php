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
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'router-ccr.jpg',
                'nama_aset' => 'Router MikroTik CCR 1',
                'status_id' => 1,
                'type' => 'Router',
                'description' => 'Router MikroTik CCR untuk mengatur lalu lintas jaringan.',
                'location' => 'Ruang Server 1',
                'serial_number' => 'SN001',
                'price' => 50000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'image' => 'radio-lhg-5hp.jpg',
                'nama_aset' => 'Radio LHG 5HP 1',
                'status_id' => 2,
                'type' => 'Radio Nirkabel',
                'description' => 'Radio LHG 5HP untuk menghubungkan jaringan nirkabel jarak jauh.',
                'location' => 'Menara Ponsel 1',
                'serial_number' => 'SN002',
                'price' => 80000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'router-ccr.jpg',
                'nama_aset' => 'Router MikroTik CCR 2',
                'status_id' => 1,
                'type' => 'Router',
                'description' => 'Router MikroTik CCR untuk mengatur lalu lintas jaringan.',
                'location' => 'Ruang Server 2',
                'serial_number' => 'SN003',
                'price' => 60000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-03-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'image' => 'radio-lhg-5hp.jpg',
                'nama_aset' => 'Radio LHG 5HP 2',
                'status_id' => 2,
                'type' => 'Radio Nirkabel',
                'description' => 'Radio LHG 5HP untuk menghubungkan jaringan nirkabel jarak jauh.',
                'location' => 'Menara Ponsel 2',
                'serial_number' => 'SN004',
                'price' => 85000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-04-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'image' => 'switch-cisco.jpg',
                'nama_aset' => 'Switch Cisco 2960 1',
                'status_id' => 1,
                'type' => 'Switch',
                'description' => 'Switch Cisco 2960 untuk menghubungkan perangkat di ruang server.',
                'location' => 'Ruang Server 3',
                'serial_number' => 'SN005',
                'price' => 45000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-05-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'image' => 'switch-cisco.jpg',
                'nama_aset' => 'Switch Cisco 2960 2',
                'status_id' => 2,
                'type' => 'Switch',
                'description' => 'Switch Cisco 2960 untuk menghubungkan perangkat di ruang server.',
                'location' => 'Ruang Server 4',
                'serial_number' => 'SN006',
                'price' => 50000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-06-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'router-ccr.jpg',
                'nama_aset' => 'Router MikroTik CCR 3',
                'status_id' => 1,
                'type' => 'Router',
                'description' => 'Router MikroTik CCR untuk mengatur lalu lintas jaringan.',
                'location' => 'Ruang Server 5',
                'serial_number' => 'SN007',
                'price' => 55000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'image' => 'radio-lhg-5hp.jpg',
                'nama_aset' => 'Radio LHG 5HP 3',
                'status_id' => 1,
                'type' => 'Radio Nirkabel',
                'description' => 'Radio LHG 5HP untuk menghubungkan jaringan nirkabel jarak jauh.',
                'location' => 'Menara Ponsel 3',
                'serial_number' => 'SN008',
                'price' => 90000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-08-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'router-ccr.jpg',
                'nama_aset' => 'Router MikroTik CCR 4',
                'status_id' => 2,
                'type' => 'Router',
                'description' => 'Router MikroTik CCR untuk mengatur lalu lintas jaringan.',
                'location' => 'Ruang Server 6',
                'serial_number' => 'SN009',
                'price' => 75000,
                // Harga dalam Rupiah
                'date_buyed' => '2023-09-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data perangkat lainnya sesuai kebutuhan
        ]);
    }

}