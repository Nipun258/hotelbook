@extends('admin.admin_master')
@section('admin')

<div class="container d-flex justify-content-center align-items-center mt-5">
  <div class="col-md-10 ">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user ">
      <div class="widget-user-header bg-info ">
        <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
        <h5 class="widget-user-desc">{{Auth::user()->role}}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="{{asset(Auth::user()->photo)}}" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center mb-5"> <!-- wrapper for the button -->
          <a href="{{ route('admin.profile.edit',Auth::user()->id) }}" class="btn btn-rounded btn-success">Edit Profile</a>
        </div>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
</div>

@endsection
