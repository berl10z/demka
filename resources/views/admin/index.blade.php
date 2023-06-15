@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex fs-3 justify-content-around">
            <a class="nav-link" href="{{  route('product.index')  }}">Products</a>
            <a class="nav-link" href="#">Orders</a>
            <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
        </div>
    </div>
@endsection
