<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//import package
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //hapus data awal
       DB::table('buku')->delete();
         
       //sample data
       $post = [
        ['title'=>'Belajar Laravel', 'content'=>'Lorem ipsum'],
        ['title'=>'Tips Belajar Laravel', 'content'=>'Lorem ipsum'],
        ['title'=>'Jadwal Latihan', 'content'=>'Lorem ipsum']
       ];
       DB::table('buku')->insert($post);
    }
}
