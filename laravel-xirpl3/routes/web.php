<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//basic
Route::get('about', function () {
    return '<h1> Hallo </h1>' .
        '<br> Selamat datang di Perpustakaan Digital';
});

Route::get('abdan', function () {
    return '<h1> Hallooo </h1>' .
        '<br><b> Nama Saya : Abdan </b>'.
        '<br> Saya sekolah di : SMK Assalaam Bandung'.
        '<br> Saya kelas : XI RPL 3'.
        '<br> Jurusannya : RPL ( Rekayasa Perangkat Lunak )';
});

Route::get('buku', function () {
    return '<br> Ini Buku saya';
});

Route::get('menu', function () {
    $data = [
        ['nama_makanan' => 'Nasi Goreng', 'harga' => 15000, 'jumlah' => 5],
        ['nama_makanan' => 'Mie Goreng', 'harga' => 12000, 'jumlah' => 5],
        ['nama_makanan' => 'Kwetiaw Goreng', 'harga' => 13000, 'jumlah' => 5],
    ];
    //single data
    $resto = "Resto MLB - Makanan Lezat dan Bergizi";

    return view('menu',compact('data', 'resto'));
});

// route Parameter (Nilai)
Route::get('books/{judul_buku}', function ($a) {
    return 'Judul Buku : ' . $a;
});

Route::get('post/{title}/{category}', function ($a,$b) {
    // compact assosiatif
    return view ('post', ['judul'=>$a, 'cat'=>$b]);
});

// Route Optional Parameter
// ditandai dengan tanda tanya (?)
Route::get('profile/{nama?}', function ($a = "guest") {
    return 'Halo Nama Saya : ' . $a;
});

Route::get('order/{item?}', function ($a = "Nasi Goreng") {
    return view ('order',compact ('a'));
});

Route::get('alat', function () {
    $data = [
        ['nama_barang' => 'Buku', 'harga' => 15000, 'jumlah' => 2],
        ['nama_barang' => 'Pensil', 'harga' => 3000, 'jumlah' => 5],
        ['nama_barang' => 'Penggaris', 'harga' => 7000, 'jumlah' => 1],
    ];
    //single data
    $alat = "Toko Alat Tulis - Murah dan Lengkap";

    return view('alat',compact('data', 'alat'));
});

Route::get('kelulusan/{nama?}/{mapel?}/{lulus?}', function ($a = "Tidak Ada Nilai", $b = "Tidak Ada Nilai", $c = "Tidak Ada Nilai") {
    return view('kelulusan', compact('a', 'b', 'c'));
});

Route::get('grading/{nama?}/{nilai?}', function ($a="guest",$b = 0) {
    return view('grading', ['nama => $a, 'nilai =>$b]);
});


Route::get('nilai-ratarata', function () {
    $siswa = [
        ["nama" => "Andi", "nilai" => 85],
        ["nama" => "Budi", "nilai" => 70],
        ["nama" => "Citra", "nilai" => 95],
    ];

    return view('nilai-ratarata', compact('siswa'));
});



