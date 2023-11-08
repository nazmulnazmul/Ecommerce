@extends('frontend.layouts.templete')
    @section('main-content') 
     
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="box_main">
            <h2 class="text-success">Welcome : {{ Auth::user()->name }}</h2>
                <ul>
                    <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
                    <li><a href="{{ route('pendingorders') }}">Pending Order</a></li>
                    <li><a href="{{ route('history') }}">History</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            @yield('profile_content')
        </div>
    </div>
</div>
@endsection 