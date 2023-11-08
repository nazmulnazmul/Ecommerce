@extends('frontend.layouts.user_profile_template')
@section('profile_content')
    <div class="box_main">
        Dashboard
        <h2>Hi ,</h2>{{ Auth::user()->name }}
    </div>
@endsection
  