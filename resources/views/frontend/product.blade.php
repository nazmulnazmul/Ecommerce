@extends('frontend.layouts.templete')
    @section('main-content') 
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4">
                    <div class="box_main">
                        <div class="tshirt_img">
                        <img src="{{ asset($product->product_img) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box_main">
                        <div class="product-info">
                            <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                            <p class="price_text text-left"> <span style="color:#262626;">TK. {{ $product->price }}</span> </p>
                        </div>
                        <div class="my-3 product-details">
                            <p class="lead text-justify">
                                {{ $product->product_long_des }}</p>
                                <ul class="p-2 bg-light my-2">
                                    <li>Category - {{ $product->product_category_name }}</li>
                                    <li>Sbu Category - {{ $product->product_subcategory_name }}</li>
                                    <li>Available Quantity - {{ $product->quantity }}</li>
                                </ul>            
                        </div>
                        <div class="btn_main">

                            <form action="{{ route('addproductcart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <div class="form-group">
                                    <label for="quantity">How many pics ?</label>
                                    <input type="number" class="form-control" min="1" placeholder="1" name="quantity">
                                </div>
                                <input type="submit" class="btn btn-warning" value="Add To Cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    <div class="fashion_section">
        <div id="main_slider ">
            <div class="container">
                <h1 class="fashion_taital">Related Products</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($related_products as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                <p class="price_text">Price  <span style="color: #262626;">Tk. {{ $product->price }}</span></p>
                                <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                                <div class="btn_main">
                                    <form action="{{ route('addproductcart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <input type="submit" class="btn btn-warning" value="Buy Now">
                                    </form>
                                    <div class="seemore_bt"><a href="{{ route('product', [$product->id, $product->slug]) }}">See More</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        </div>
    @endsection