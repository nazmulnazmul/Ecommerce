@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Update Sub Category
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Update Sub Category</h4>

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Update Sub Category</h5>
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
        <form action="{{ route('updatesubcategory') }}" method="POST">
            @csrf
          <div class="row mb-3">
            <input type="hidden" name="subcat_id" value="{{ $subcatategory_info->id }}">
            <label class="col-sm-2 col-form-label" for="sub_category">Sub Category Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sub_category" name="subcategory_name" value="{{ $subcatategory_info->subcategory_name }}" />
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update Sub Category</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

