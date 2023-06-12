@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="text-center">Корзина</h2>
    <div class="d-flex justify-content-around align-items-center">
        @foreach ($carts as $c)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Name: {{ $c->product->name }}</h5>
              <p class="card-text">Count: {{ $c->quantity }}</p>
              <p class="card-text">Price: {{ $c->product->price }}</p>
              <a class="btn btn-primary" href="{{ route('addToCart',$c->product->id) }}">+</a></button>
              <a class="btn btn-primary" href="{{ route('removeFromCart',$c->id) }}">-</a></button>
              <a class="btn btn-primary" href="{{ route('deleteFromCart',$c->id) }}">снести</a></button>
            </div>
        </div>
        @endforeach
        @if ($carts->count())
        <form action="{{ route('order.create') }}" method="post">
            @csrf
            <input type="password" name="password" id="password">
            <button type="submit">Оформить</button>
        </form>
        @endif
    </div>
</div>

@endsection
