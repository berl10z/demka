@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Продукты</h2>
        @foreach ($products as $p)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'.$p->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $p->name }}</h5>
                <p class="card-text">Цена: {{ $p->price }}</p>
                <p class="card-text">Кол-во :{{ $p->count }}</p>
                <a href="{{ route('product.show',$p->id) }}" class="btn btn-primary">Подробнее</a>
                <a href="{{ route('product.edit',$p->id) }}" class="btn btn-primary">Изменить</a>
                <a href="{{ route('product.destroy',$p->id) }}" class="btn btn-danger">Удалить</a>
            </div>
        </div>
        @endforeach
        <a href="{{ route('product.create') }}" class="btn btn-success m-3">Создать</a>
        <a href="{{ route('category.create') }}" class="btn btn-success m-3">Создать категорию</a>
    </div>
@endsection
