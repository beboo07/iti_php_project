<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<body>
    <form action="{{route('category.Create')}}" method="POST" enctype="application/json" >
        @csrf

        <input type="text" name="id" placeholder="id">

        @error('id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="text" name="name" placeholder="category name">

        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror






        <input type="submit" >

    </form>
</body>
</html>
