@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Product
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> All Products</h4>
    <div class="card">
         <h5 class="card-header">Avaiable All Products Information</h5>
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
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $i=1; @endphp
            @foreach ($allproducts as $product)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>
                        <img src="{{ asset($product->product_img) }}" alt=""  style="width: 4.5rem;"><br><br>
                        <a href="{{ route('editproductimg', $product->id) }}" class="btn btn-primary">Update Image</a>
                    </td>
                    <td>{{ $product->price }}</td>
                    <td  class="text-center">
                        <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary" onclick="return confirm('Are you Sure Data Edit !!');">Edit</a>
                        <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-warning" onclick="return confirm('Are you Sure Data Deleted !!');">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection



        