@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Edit Product Image
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Update Product Image</h4>

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Update Product Image</h5>
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
        <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ ($allproducts->id) }}">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sub_category">Previous Image</label>
            <div class="col-sm-10">
                <img src="{{ asset($allproducts->product_img) }}" alt=""  style="width: 4rem;" class="img-fluid"><br><br>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="img">Upload New Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="img" name="product_img"/>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update Product Image</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection