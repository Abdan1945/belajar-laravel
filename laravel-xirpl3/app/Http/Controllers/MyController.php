<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function hello() {
        $nama = "Abdan";
        $umur = 16;

        return view('hello', compact('nama','umur'));
    }

    public function siswa () 
    {
        $data = [
            ['nama'=>'Abdan', 'kelas'=>'XI RPL 3', 'alamat'=>'Bandung'],
            ['nama'=>'Asep', 'kelas'=>'XI RPL 2', 'alamat'=>'Cianjur'],
            ['nama'=>'Udin', 'kelas'=>'XI RPL 1', 'alamat'=>'Garut'],
        ];
        return view('siswa', compact('data'));
    }
}
