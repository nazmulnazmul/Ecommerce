@extends('frontend.layouts.user_profile_template')
@section('profile_content')
    
@if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
@endif

<div class="row">
    
    <div class="box_main">
    <h4 class="text-center mt-3">Pending order</h4>
    <table class="table">
        <tr>
            <th>Product Id</th>
            <th>Product Price</th>
            <th>Total</th>
        </tr>
        @foreach ($pending_order as $order)
            <tr>
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->total_price }}</td>
            </tr>
        @endforeach
        
    </table>
    </div>
</div>
@endsection