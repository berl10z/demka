@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Создание продукта</h2>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            {{ json_encode($errors->all()) }}
            <div class="row mb-3">
                <label for="name" class="col-form-label">{{ __('Имя ') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-form-label">{{ __('image ') }}</label>
                <div class="col-md-6">
                    <input id="image" accept="image/*" type="file" class="form-control" name="image" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-form-label">{{ __('price ') }}</label>
                <div class="col-md-6">
                    <input id="price" type="number" class="form-control" name="price" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="count" class="col-form-label">{{ __('count ') }}</label>
                <div class="col-md-6">
                    <input id="count" type="count" class="form-control" name="count" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>Выберите категорию</option>
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
