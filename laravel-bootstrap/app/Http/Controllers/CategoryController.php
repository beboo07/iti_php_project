<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::get();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'id'=>'required',
            'name'=>'required',


        ]);
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function show(string $id)
    {
        //
        $category=Category::find($id);
        return view('category.show',compact('category'));
    }

    public function edit(Request $request, string $id)
    {
        $category=Category::find($id);
    $category->update($request->all());
    return redirect()->route('category.index');
    }
    public function update(Request $request, string $id)
    {
        $category=Category::find($id);
        return view('category.update',
        compact('category'));
    }


    public function destroy(string $id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('category.index');
    }
}
