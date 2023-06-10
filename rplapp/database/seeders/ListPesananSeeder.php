<?php

namespace Database\Seeders;

use App\Models\ListPesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengisi data random ke dalam tabel listpesanan
        // Generate 20 data random
        $data=[];
        for ($i = 1; $i <= 20; $i++) {
            $data[] =[
                'status' => 'Menunggu Konfirmasi ' ,
                'nama_barang' => 'Barang ' . $i,
                'stok' => rand(1, 100),
                'nama_pembeli' => 'Pembeli ' . $i,
                'kontak_pembeli' => 'Kontak ' . $i,
                'no_hp_pembeli' => 'No. HP ' . $i,
                'alamat_pembeli' => 'Alamat ' . $i,
            ];
        }
        DB::table('listpesanan')->insert($data);

        // Mengisi data random ke dalam tabel listpesanan
        
    }
}
