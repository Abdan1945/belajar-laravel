<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //sample data
       $buku = [
        ['Judul_Buku'=>'Pemrograman Web', 'Pengarang'=>'Abdan', 'Halaman'=>'200', 'Tahun_Terbit'=>'2020', 'Harga'=>'50000'],
        ['Judul_Buku'=>'Belajar Laravel', 'Pengarang'=>'Budi', 'Halaman'=>'250', 'Tahun_Terbit'=>'2021', 'Harga'=>'75000'],
        ['Judul_Buku' => 'Kancil', 'Pengarang' => 'Budi', 'Halaman' => '250', 'Tahun_Terbit' => '2021', 'Harga' => '75000'],
        ['Judul_Buku' => 'Kelinci dan kura-kura sedang lomba lari', 'Pengarang' => 'Budi', 'Halaman' => '250', 'Tahun_Terbit' => '2021', 'Harga' => '75000'],
        ['Judul_Buku'=>'Tips Belajar PHP', 'Pengarang'=>'Citra', 'Halaman'=>'150', 'Tahun_Terbit'=>'2019', 'Harga'=>'40000']
       ];
       DB::table('buku')->insert($buku);
    }
}
