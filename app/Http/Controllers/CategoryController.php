<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $categories = Category::whereId($id)->first();
        return view('category.edit', compact('categories'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back();
    }

    public function destroy($id){
        $categories = Category::all();
        $category = Category::where('id', $id)->delete();

        return redirect()->back();
    }


}
