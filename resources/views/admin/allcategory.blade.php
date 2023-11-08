@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Category
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Category</h4>
    <div class="card">
        <h5 class="card-header">Avaiable Category Information</h5>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div> 

    <div class="table-responsive text-nowrap">
        <table class="table">
        <thead class="table-light">
            <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Sub Catrgory</th>
            <th>Slug</th>
            <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $i = 1; @endphp
            @foreach ($categories as $category)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->subcategory_count }}</td>
                <td>{{ $category->slug }}</td>
                <td  class="text-center">
                    <a href="{{ route('editcategory', ['id' => $category->id]) }}" class="btn btn-primary" onclick="return confirm('Are you sure this data Edit !!')">Edit</a>
                    <a href="{{ route('deletecategory', ['id' => $category->id]) }}" class="btn btn-warning" onclick="return confirm('Are you sure this date deleted !!')">Delete</a>
                    
                </td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>
</div>
@endsection