

@extends('frontend.layouts.templete')
    @section('main-content') 
        <h2>Add to Cart Page</h2>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="box_main">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Sl.</th>
                                <th>Product Name</th>
                                <th>Product Photo</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
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

                                    $product_img = App\Models\Product::where('id', $item->product_id)
                                    ->value('product_img');
                                @endphp

                                
                                    <td>{{  $i++ }}</td>
                                    <td>{{  $product_name }}</td>
                                    <td>
                                        <img src="{{ asset($product_img) }}" alt="" width="100px;" class="img-thumbnail">
                                    </td>
                                    <td>{{  $item->price }}</td>
                                    <td>{{  $item->quantity }}</td>
                                    <td>
                                        <a href="{{ route('removeitem', $item->id) }}" class="btn btn-warning" onclick="return confirm('Are You Sure Item Remove !!')">Remove</a>
                                    </td>
                                </tr>
                                @php
                                    $total = $total + $item->price;
                                @endphp

                            @endforeach

                            @if ($total > 0)
                                <tr>
                                    <td class="bg-warning"></td>
                                    <td class="text-dark bg-darker bg-warning mt-3 py-3" style="font-size:large">Total Tk. :</td>
                                    <td class="bg-warning"></td>
                                    <td class="text-dark bg-warning mt-3 py-3" style="font-size:large">{{  $total }}</td>
                                    <td class="bg-warning"></td>
                                    <td ><a href="{{ route('shippingaddress') }}" class="btn btn-success">Checkout Now</a></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection



   