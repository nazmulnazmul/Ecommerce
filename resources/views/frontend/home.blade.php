@extends('frontend.layouts.templete')
    @section('main-content') 
    <!-- <h2 class="py-5">Home page</h2> -->
    <div class="fashion_section">
         <div id="main_slider">
            <div class="container">
               <h1 class="fashion_taital">All Product</h1>
               <div class="fashion_section_2">
                  <div class="row">
                  @foreach ($products as $product)
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
      <!-- fashion section end -->
      


@endsection



