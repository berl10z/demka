@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-around">
        @foreach ($products as $p)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Name: {{ $p->name }}</h5>
              <p class="card-text">Count: {{ $p->count }}</p>
              <p class="card-text">Price: {{ $p->price }}</p>
              <a class="btn btn-primary" href="{{ route('addToCart',$p->id) }}">Добавить</a></button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
