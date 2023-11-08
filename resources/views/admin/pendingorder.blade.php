@extends('admin.layouts.template')
    @section('page_title')
        Dashboard - Pending Order
    @endsection

    @section('content')
        <div class="container my-3">
            <div class="card p-3">
                <div class="card-title"><h3 class="text-center p-3">Pending Orders</h3></div>
                <div class="card-body">
                    
                        <table class="table">
                            <tr>
                                <th>User Id</th>
                                <th>Shipping Information</th>
                                <th>Product Id</th>
                                <th>Quantity</th>
                                <th>Total Will Pay</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($pending_order as $order)
                                <tr>
                                    <td>{{ $order->user_id }}</td>
                                    <td>
                                        <ul>
                                            <li>{{ $order->shipping_phoneNumber}}</li>
                                            <li>{{ $order->shipping_city}}</li>
                                            <li>{{ $order->shipping_postalcode}}</li>
                                        </ul>
                                    </td>
                                    <td>{{ $order->product_id}}</td>
                                    <td>{{ $order->quantity}}</td>
                                    <td>{{ $order->total_price}}</td>
                                    <td>
                                        <a href="" class="btn btn-success">Approve</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    
                </div>
            </div>
        </div>
    @endsection