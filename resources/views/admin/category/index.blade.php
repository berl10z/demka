@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Категории</h2>
            <ul class="nav fs-2 d-flex flex-column">
                @foreach ($categories as $c)
                <li class="nav-item">
                    <p class="nav-link">{{ $c->name }}</p>
                </li>
                <a href="{{ route('category.destroy',$c->id) }}" class="nav-link text-danger">Удалить</a>
                <a href="{{ route('category.edit',$c->id) }}" class="nav-link text-primary">Изменить</a>
                @endforeach
            </ul>
        <a href="{{ route('category.create') }}" class="nav-link fs-3">Создать</a>
    </div>
@endsection
