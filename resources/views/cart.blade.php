@extends('layouts.app')
@section('content')

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

@endsection
