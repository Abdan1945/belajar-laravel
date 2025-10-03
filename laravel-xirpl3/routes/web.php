<?php

use App\Http\Controllers\MyController; // conroller harus di import / dipanggil dulu
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

// Route::get('post/{title}/{category}', function ($a,$b) {
//     // compact assosiatif
//     return view ('post', ['judul'=>$a, 'cat'=>$b]);
// });

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
    return view('grading', ['nama' => $a, 'nilai' =>$b]);
});


Route::get('nilai-ratarata', function () {
    $siswa = [
        ["nama" => "Andi", "nilai" => 85],
        ["nama" => "Budi", "nilai" => 70],
        ["nama" => "Citra", "nilai" => 95],
    ];

    return view('nilai-ratarata', compact('siswa'));
});

//route model
Route::get('test-model', function () {
    //menampilkan semua data yang ada di table posts
    $data = App\Models\Post::all();
    return $data;
});



Route::get('create-data', function () {
    //membuat data baru melalui model
    $data = App\Models\Post::create([
        'title' => 'Harry Potter',
        'content' => 'Lorem ipsum'
    ]);
    return $data;
});

Route::get('show-data/{id}', function ($id) {
    //mencari data berdasarkan id
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function ($id) {
    //mencari data berdasarkan id
    $data = App\Models\Post::find($id);
    $data->title = "Membangun Project dengan Laravel";
    $data->save();
    return $data;
});

Route::get('delete-data/{id}', function ($id) {
    //mencari data berdasarkan id
    $data = App\Models\Post::find($id);
    $data->delete();
    // di kembalikan (alihkan) ke halaman test-model
    return redirect('test-model');
});

Route::get('search/{cari}', function ($query) {
    //mencari data berdasarkan title yang mirip seperti (like) 'Laravel'
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});

// pemanggilan url menggunakan controller 
Route::get('greetings', [MyController::class, 'hello']);

Route::get('student', [MyController::class, 'siswa']);

use App\Http\Controllers\PostController; // conroller harus di import / dipanggil dulu

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//post 
Route::get('post', [PostController::class, 'index'])->name('post.index');
// tambah data post
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
// edit data post
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');