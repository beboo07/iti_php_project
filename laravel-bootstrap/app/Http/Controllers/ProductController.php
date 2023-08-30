<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index()
    {
     $products=Product::get();
    // //  dd($products); dump and die
    //   dump($products);
      return view('product.index',['products'=>$products]);
    }
    function show($id)
    {
        $product=Product::find($id);
        // $product2=product::where('product_id',$id)->get();
        // dump($product);
        // dd($product2); dump and die
        // dd(compact('product'));
        //  $product=Product::get();
        //  dd($product->toArray());

        return view('product.show',compact('product'));
    }
    function destroy($id)
    {
        //   $product=product::find($id);
        //   $product->delete();
        Product::where('id',$id)->delete();
          return redirect()->route('product.index');
    }
    function update($id)
    {
       $product=Product::find($id);
       return view('product.update',
       compact('product'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Product::where('product_name', 'LIKE', "%$searchTerm%")
            ->orWhere('category_id', 'LIKE', "%$searchTerm%")
            ->get();

        return view('product.index', compact('products'));
    }
    function edit($id,Request $request)
    {
    //   dd($id,$request->all());
    $product=product::find($id);
    // $product->update([
    //     "product_name"=>$request->product_name,
    // ]);
    $product->update($request->all());
    return redirect()->route('product.index');
    }
    function create()
    {
        return view('product.create');
    }

    function store(Request $request)
    {
        $validated=$request->validate([
            'product_name'=>'required',
            'product_price'=>'required',
            'product_availability'=>'required',
            'categry_id'=>'required',
            #'admin_id'=>'required',

        ]);
        echo $request;
        product::create($request->all());
        return redirect()->route('product.index');
    }
}
