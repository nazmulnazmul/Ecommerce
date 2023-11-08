@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Sub Category
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Sub Category</h4>
    <div class="card">
    <h5 class="card-header">Avaiable All Sub Category Information</h5>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="table-responsive text-nowrap">
        <table class="table">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Sub Category Name</th>
                <th>Catrgory</th>
                <th>Product</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php
                $i=1;
            @endphp
            @foreach ($allsubcategories as $allsubcategry)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $allsubcategry->subcategory_name }}</td>
                    <td>{{ $allsubcategry->category_name }}</td>
                    <td>{{ $allsubcategry->product_count }}</td>
                    <td  class="text-center">
                        <a href="{{ route('editsubcategory', ['id' => $allsubcategry->id]) }}" class="btn btn-primary" onclick="return confirm('Are You Sure Data Edit !!')">Edit</a>
                        <a href="{{ route('deletesubcategory', ['id' => $allsubcategry->id]) }}" class="btn btn-warning" onclick="return confirm('Are You Sure Data Deleted !!')">Delete</a>
                    </td>
                </tr>
            @endforeach

            
            
        </tbody>
        </table>
    </div>
</div>
@endsection