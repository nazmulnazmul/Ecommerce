@extends('frontend.layouts.templete')
    @section('main-content') 
        <h2 class="py-3">Provide your Shipping Information</h2>
 <div class="row">
    <div class="col-12">
        <div class="box_main">
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  @endforeach
              </ul>
          </div>
        @endif
            <form action="{{ route('addshippingaddress') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="number" name="phone_number" class="form-control">
                </div>


                <div class="form-group">
                    <label for="city_name">City / Village Name</label>
                    <input type="text" name="city_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="postal_Code">Postal Code</label>
                    <input type="number" name="postal_Code" class="form-control">
                </div>

                    <input type="submit" value="Next" class="btn btn-primary form-control">
            </form>
        </div>
    </div>
</div>
    @endsection

