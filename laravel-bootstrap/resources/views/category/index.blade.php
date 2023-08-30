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
    <fieldset>
        <legend>
            Categories
        </legend>
        <table>
        @admin
        <a href="{{route('category.create')}}">Create Product</a>
        @endadmin
       <thead>
        <tr>
            <th> Category Id</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
       </thead>
       <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>
              {{$category->id}}
            </td>
            <td>
                {{$category->name}}
              </td>

            <td>
                {{-- <a href="{{route('category.show',$category->id)}}">show</a> --}}

           <form action="{{route('category.show',$category->id)}}">
            <button type='submit'>show</button>
           </form>
           @admin
           <form action="{{route('category.delete',$category->id)}}" method="POST">
            @method('DELETE')
            @csrf
               <button type="submit">Delete</button>
           </form>
            <form action="{{route('category.update',$category->id)}}">

                <button>Update</button>
            </form>
            @endadmin
            </td>
        </tr>

        @endforeach

       </tbody>
        </table>
    </fieldset>


</body>
</html>
@endsection
