@extends('admin.admin_master')
@section('admin')
<div class="content d-flex justify-content-center align-items-center">
<div class="login-box ">
  <div class="login-logo">
    <a href="../../index2.html"><b>Hotel</b>Book</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="{{ route('admin.password.update') }}" method="post">
      @csrf
        @method('put')
      
      <div class="input-group mb-3">
          <input type="password" name="current_password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        @error('current_password')
					<span class="text-danger">{{ $message }}</span>
					@enderror
        <div class="input-group mb-3">
          <input type="password" name="password"class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        @error('password')
					<span class="text-danger">{{ $message }}</span>
					@enderror


                    <div class="input-group mb-3">
          <input type="password" name="password_confirmation"class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        @error('password_confirmation')
					<span class="text-danger">{{ $message }}</span>
					@enderror

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
@endsection