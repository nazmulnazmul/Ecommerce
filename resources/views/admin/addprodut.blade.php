@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Add Product
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Add Product</h4>

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add New Product</h5>
        <small class="text-muted float-end">Input Information</small>
      </div>
      <div class="card-body">
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
        <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sub_category">Product Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sub_category" name="product_name" placeholder="Electronic" />
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="Product_Price">Product Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="Product_Price" name="product_price" placeholder="101" />
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="Product_quantity">Product Quantity</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="Product_quantity" name="product_quantity" placeholder="101" />
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="Product_sort_des">Product Sort Description</label>
            <div class="col-sm-10">
              <textarea name="product_sort_des" class="form-control" id="Product_sort_des" cols="10" rows="3"></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="Product_long_des">Product Long Description</label>
            <div class="col-sm-10">
            <textarea name="product_long_des" class="form-control" id="Product_long_des" cols="10" rows="5"></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="select_category">Select Category</label>
            <div class="col-sm-10">
                <select class="form-select" id="select_category" name="product_category_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)   
                       <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sub_select_category">Select Sub Category</label>
            <div class="col-sm-10">
                <select class="form-select" id="sub_select_category" name="product_subcategory_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>

                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                    @endforeach
                    
                </select>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="img">Upload Product Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="img" name="product_img"/>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection