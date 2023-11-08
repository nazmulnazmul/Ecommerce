@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Add Sub Category
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Add Sub Category</h4>

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add New Sub Category</h5>
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
        <form action="{{ route('storesubcategory') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sub_category">Sub Category Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sub_category" name="subcategory_name" placeholder="Electronic" />
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sub_category_name">Select Category</label>
            <div class="col-sm-10">
                <select class="form-select" id="sub_category_name" name="category_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ( $categries as $categry)
                      <option value="{{ $categry->id }}">{{ $categry->category_name }}</option>
                    @endforeach
                    
                </select>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add Sub Category</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
