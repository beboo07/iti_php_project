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
                        welcome to admin dashboard
                    {{ __('You are logged in!') }}</br>
                </div>
                </div>
                <!-- <h1>Your Ordered Products</h1> -->

            </div>

        <ul>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h1>Your Ordered Products</h1>

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
</div>
@endsection
