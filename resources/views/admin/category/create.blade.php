@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Создание категории</h2>
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-form-label">{{ __('Имя ') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
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
