<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //secara otomatis model ini menganggap
    //table yang digunakan adalah table 'posts'

    //apa aja yang boleh diisi
    protected $fillable = ['title','content'];

    //field yang mau ditampilkan
    public $visible = ['id','title','content'];

    //mengisi tanggal kapan  dibuat dan kapan diupdate secara otomatis
    public $timestamps = true;
}
