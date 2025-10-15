<?php
namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Database\Seeder;


class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => 'galih',
            'nim'  => '123456',
        ]);

        Wali::create([
            'nama'         => 'Pak Hendri',
            'id_mahasiswa' => $mahasiswa->id,
        ]);
    }
}