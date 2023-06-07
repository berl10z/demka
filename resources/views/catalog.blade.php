@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Сортировка по цене
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{ route('catalog', ['sort'=>'desc']) }}">По убыванию</a></li>
          <li><a class="dropdown-item" href="{{ route('catalog', ['sort'=>'asc']) }}">По возрастанию</a></li>
        </ul>
      </div>
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
