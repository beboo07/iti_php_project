<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('category.edit',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="id" value="{{$category->id}}">
        <input type="text" name="name" value="{{$category->name}}">

        <input type="submit" >

    </form>
</body>
</html>
