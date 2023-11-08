@extends('frontend.layouts.templete')
    @section('main-content') 
        <h2>Final step To place Order</h2>
    
<div class="row">
    <div class="col-6">
        <div class="box_main">
            <h4>Product will Send At-</h4> 
                <p>City / Village Name - {{  $shipping_address->city_name }}</p>
                <p>Postal Code - {{  $shipping_address->postal_Code }}</p>
                <p>Phone Number - {{  $shipping_address->phone_number }}</p>         
        </div>
    </div>

    <div class="col-6">
        <div class="box_main">
            <h4>Your Final Product Are-</h4>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Sl.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>

                    @php
                        $i = 1 ;
                    @endphp
                    

                    @php
                        $total = 0;
                    @endphp

                    @foreach ($cart_items as $item )
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id', $item->product_id)
                                ->value('product_name');
                            @endphp

                            <td>{{  $i++ }}</td>
                            <td>{{  $product_name }}</td>
                            <td>{{  $item->price }}</td>
                            <td>{{  $item->quantity }}</td>
                            
                        </tr>
                        @php
                            $total = $total * $item->price;
                        @endphp

                    @endforeach

                    @if ($total > 0)
                        <tr class="bg-warning text-dark" style="font-size: large;">
                            <td></td>
                            <td>Total Tk. </td>
                            <td></td>
                            <td>{{  $total }}</td>
                            <!-- <td ><a href="{{ route('shippingaddress') }}" class="btn btn-success">Checkout Now</a></td> -->
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('placeorder') }}" method="POSt">
        @csrf
        <input type="submit" value="Place Order" class="btn btn-primary mr-3">
    </form>

    <form action="" method="POSt">
        @csrf
        <input type="submit" value="Cancle Order" class="btn btn-danger mr-3">
    </form>

</div>
    @endsection