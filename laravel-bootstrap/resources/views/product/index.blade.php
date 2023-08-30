@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>Document</title>
</head>
<body>

<form action="{{ route('products.search') }}" method="GET">
        <input type="text" name="search" placeholder="Search products...">
        <button type="submit">Search</button>
    </form>
   <table>
    <a href="{{route('product.create')}}">Create Product</a>
    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session('success') }}
                        </div>
                    @endif
    <!-- <a href="{{route('ordersss')}}">Create Product</a> -->
    <thead>
        <tr>
            <th>Product name</th>
            <th>Product price</th>
            <th>Product availability</th>
            <th>Category Name</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->product_availability}}</td>
            <td>{{$product->category->name}}</td>

            <td>
                <!-- {{-- <a href="{{route('product.show')}}">show</a> --}} -->
                <!-- order.create -->
           <form action="{{route('product.show',$product->id)}}">
            <button type='submit'>show</button>
           </form>
           <!-- <form action="{{route('order.create',$product->id)}}">
            <button type='submit'>order</button>
           </form> -->
           <form method="POST" action="{{ route('order.create') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1">
            <button type="submit">Place Order</button>
            </form>
           @admin
           <form action="{{route('product.delete',$product->id)}}" method="POST">
            @method('DELETE')
            @csrf
               <button type="submit">Delete</button>
           </form>
            <form action="{{route('product.update',$product->id)}}">

                <button>Update</button>
            @endadmin
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>

</body>
</html>
@endsection
