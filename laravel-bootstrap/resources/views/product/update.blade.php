<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.edit',$product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="product_name" value="{{$product->product_name}}">
        <input type="text" name="product_price" value="{{$product->product_price}}">
        <input type="text" name="product_availability" value="{{$product->product_availability}}">
        <input type="text" name="category_id" value="{{$product->category_id}}">
        <input type="submit" >

    </form>
</body>
</html>
