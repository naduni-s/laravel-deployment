@extends('layouts.layout') <!-- Extends the layout -->

@section('title', 'User Details') <!-- Sets the page title -->

@section('content')

<h1>Your Orders</h1>

{{-- Debugging --}}
@if(isset($orders))
    <p>Orders variable is set</p>
@endif

@if($orders->isEmpty())
    <p>You have no orders yet.</p>
@else
    <ul>
        @foreach($orders as $order)
            <li>Order ID: {{ $order->id }} - Status: {{ $order->status }} - Total: ${{ $order->total_amount }}</li>
        @endforeach
    </ul>
@endif

@endsection