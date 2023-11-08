@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecom
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
            <!-- <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Dashboard 🎉</h5>
                        <p class="mb-4">
                        You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                        your profile.
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                    </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        
                    </div>
                    </div>
                </div>
                </div>
            </div> -->
            <h2>Dashboard</h2><hr>
            <div class="col-md-3">
                <div class="card shadow bg-danger">
                    <div class="card-header text-dark">Total : <?= $totalproduct; ?></div>
                    <div class="card-body">
                        <h5 class="text-dark">Product</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow bg-primary">
                    <div class="card-header text-dark">Total : <?= $totalcategory; ?></div>
                        <div class="card-body">
                            <h5 class="text-dark">Category </h5>
                        </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card shadow bg-warning">
                    <div class="card-header text-dark">Total :  <?= $totalsubcategory; ?></div>
                        <div class="card-body">
                            <h5 class="text-dark">Sub Category</h5>
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow bg-info">
                    <div class="card-header text-dark">Total : <?= $totalAllUsers; ?></div>
                        <div class="card-body">
                            <h5 class="text-dark">Users </h5>
                        </div>
                </div>
            </div>

            <div class="col-md-3 py-3">
                <div class="card shadow bg-success">
                    <div class="card-header text-dark">Total : <?= $totalorders; ?></div>
                        <div class="card-body">
                            <h5 class="text-dark">Orders </h5>
                        </div>
                </div>
            </div>

        </div>
    </div>
@endsection