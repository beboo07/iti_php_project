<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        $categories=Category::get();
        return response()->json(['data'=>$categories,'message'=>'data returned successfully ']);

    }
    function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',

        ]);

        try {
            //code...
            $categories=Category::create($request->all());

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'Server not Available now try later',503]);
        }
       return response()->json(['data'=>$categories]);
    }
    function show($id)
    {
        $category=Category::find($id);
        if( $category)
        {
        return response()->json(['data'=>$category,'message'=>'category returned successfully']);

        }
        return response()->json(['message'=>"category doesn't exist"]);


    }
    function destroy($id)
    {
        $category=Category::find($id);
        if($category)
        {
            $category->delete();
            return response()->json(['message'=>'category deleted successfully']);
        }
        return response()->json(['message'=>"category doesn't exist"]);


    }
    function edit($id,Request $request)
    {
        $category=Category::find($id);
        if($category)
        {
            $category->update($request->all());
            return response()->json(['data'=>$category,'message'=>'category updated successfully']);
    }
    return response()->json(['message'=>"category doesn't exist"]);

    }
}
