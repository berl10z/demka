@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            @forelse ($orders as $o)
            <div class="col-lg-3 col-12 col-md-6">
                <div class="card @switch($o->status)
                    @case(1)
                        text-bg-primary
                        @break
                    @case(2)
                        text-bg-success
                        @break
                    @case(3)
                        text-bg-danger
                        @break
                @endswitch">
                    <div class="card-header">Заказ №: {{ $o->id }}</div>
                    <div class="card-body">
                        <p>Имя товара: {{ $o->product->name }}</p>
                        <p>Имя заказчика: {{ $o->user->fullName() }}</p>
                        <p>Кол-во: {{ $o->quantity }}</p>
                        <p>Статус: {{ $o->getStatus() }}</p>
                    </div>
                </div>
            </div>
            @empty

            <p>Нет кароче заказов</p>
            @endforelse
        </div>
    </div>
@endsection
