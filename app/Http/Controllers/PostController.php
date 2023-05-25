<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function welcome(){
        $post = Post::all();
        return view('welcome', compact('post'));
    }

    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request){
        if ($request->hasfile('foto')) {
            $foto_profile_update = $request->file('foto');
            $name = time() . rand(1, 50) . '.' . $foto_profile_update->extension();
            $path = public_path('/foto');
            // dd($path);
            $img = Image::make($foto_profile_update->path());
            $img->resize(600, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name);
            $pict = $name;
        }
        $author_id = auth()->user()->id;
        // dd($author_id);
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category_id,
            'author_id' => $author_id,
            'foto' => $pict
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $post = Post::whereId($id)->first();
        $category = Category::all();
        return view('posts.edit', compact('category','post'));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        if ($request->hasfile('foto')) {
            $foto_profile_update = $request->file('foto');
            $name = time() . rand(1, 50) . '.' . $foto_profile_update->extension();
            $path = public_path('/foto');
            // dd($path);
            $img = Image::make($foto_profile_update->path());
            $img->resize(600, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name);
            $pict = $name;
            if ($pict != null) # kalo sudah ada profile dan mau update, function delete old pic
            {
                $path = public_path('/foto');
                File::delete($path . '/' . $post->foto);
            }
        }
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category_id,
            'foto' => $pict
        ]);
        return redirect()->back();
    }
}
