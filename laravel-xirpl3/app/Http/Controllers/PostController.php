<?php

namespace App\Http\Controllers;

//import model Post
use App\Models\Post;

class PostController extends Controller
{
    // daftar post
    public function index() 
    {
        //menampilkan semua data dari model Post
        $post = Post::all();
        return view ('post.index', compact('post'));
    }
    
}
