@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Order</div>

                <div class="panel-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <order-component status="{{$order->status->name}}" initial="{{$order->status->percent}}" order_id="{{$order->id}}"></order-component>

                    <hr>

                    <div class="order-details">
                        <strong>order id</strong> {{$order->id}} <br>
                        <strong>Size:</strong> {{ $order->size }} <br>
                        <strong>Toppings:</strong> {{ $order->toppings }} <br>

                        @if($order->instructions!='')
                        <strong>Instruction</strong> {{$order->instructions}} <br>
                        @endif
                    </div>

                    <a class="btn btn-primary" href="{{route('user.orders')}}">back to your orders</a>

                </div> <!-- end panel-body -->
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection