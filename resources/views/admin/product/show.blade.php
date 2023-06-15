@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex">
            <div class="col-3">
                <p>{{ $product->name }}</p>
                <p>{{ $product->price }}</p>
                <p>{{ $product->count }}</p>
            </div>
            <div class="col-9">
                <img class="w-50" src="{{ asset('storage/'.$product->image) }}" alt="product_image">
            </div>
        </div>
    </div>
@endsection
