@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Редактирование продукта</h2>
        <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
            @csrf
            {{ json_encode($errors->all()) }}
            <div class="row mb-3">
                <label for="name" class="col-form-label">{{ __('Имя ') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
            </div>
            <div class="mb-3">
                <p class="fs-3">Старое изображение</p>
                <img src="{{ asset('storage/'.$product->image) }}" alt="">
            </div>
            <div class="row mb-3">
                <label for="image" class="col-form-label">{{ __('image ') }}</label>
                <div class="col-md-6">
                    <input id="image" accept="image/*" type="file" class="form-control" name="image">
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-form-label">{{ __('price ') }}</label>
                <div class="col-md-6">
                    <input id="price" type="number" value="{{ $product->price }}" class="form-control" name="price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="count" class="col-form-label">{{ __('count ') }}</label>
                <div class="col-md-6">
                    <input id="count" type="number" value="{{ $product->count }}" class="form-control" name="count">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Создать') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
