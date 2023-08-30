@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-success" role="alert">
                            {{ Session('error') }}
                        </div>
                    @endif
                    welcome to user dashboard
                    {{ __('You are logged in!') }}
                </div>
                <h1>Your Ordered Products</h1>

            </div>
        </div>
        <ul>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        @foreach ($userOrderedProducts as $product)
            <li>
                Product Name: {{ $product['product_name'] }}<br>
                Product Price: ${{ $product['product_price'] }}<br>
                Quantity: {{ $product['quantity'] }}
            </li>
        @endforeach
    </ul>


            </div>
        </div>
    </div>
</div>
@endsection
