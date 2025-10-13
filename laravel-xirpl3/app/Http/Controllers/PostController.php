<?php

namespace App\Http\Controllers;

//import model Post
use App\Models\Post;
//import package Request
use Illuminate\Http\Request;
class PostController extends Controller
{
    // beri middleware auth untuk megecek sudah login atau belum
    public function __construct()
    {
        $this->middleware('auth');
    }

    // daftar post
    public function index() 
    {
        //menampilkan semua data dari model Post
        $post = Post::all();
        return view ('post.index', compact('post'));
    }
    
    public function create() 
    {
        return view('post.create');
    }

    public function store(Request $request) 
    {
        //validasi data
        $post   = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save(); //simpan data ke database
        return redirect()->route('post.index'); //alihkan halaman ke halaman post (daftar post
    }


    public function show($id)
    {
        //mencari data post berdasarkan parameter 'id'
        $post = Post::findOrfail($id);
        return view('post.show', compact('post'));
    }
    
    public function edit($id)
    {
        //mencari data post berdasarkan parameter 'id'
        $post = Post::findOrfail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        //mencari data post berdasarkan parameter 'id'
        $post = Post::findOrfail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        // di alihkan ke halaman post melalui route 'post.index' 
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        //mencari data post berdasarkan parameter 'id'
        $post = Post::findOrfail($id);
        $post->delete(); //setelah data di temukan kemudian di hapus
        return redirect()->route('post.index');
    }
}
