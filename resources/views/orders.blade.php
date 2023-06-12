@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($orders as $o)
                <div class="col">
                    @php
                        $sumQty = 0;
                    @endphp
                    Заказ номер: {{ $o->id }}
                    @foreach ($o->carts as $c)
                        Имя продукта: {{ $c->product->name }}
                        Кол-во: {{ $c->quantity }}
                        @php
                            $sumQty += $c->quantity;
                        @endphp
                    @endforeach
                    Количество всех товаров в заказе: {{ $sumQty }}
                </div>
                @if ($o->status == 0)
                 <form action="{{ route('order.delete', $o->id) }}" method="post">
                    @csrf
                    <button type="submit">удалить</button>
                 </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection
