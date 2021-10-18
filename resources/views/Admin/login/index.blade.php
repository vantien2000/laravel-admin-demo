@extends('Admin.layout.pantLogin')
@section('body')
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ url('admin/login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo !empty(Cookie::get('email')) ? Cookie::get('email') : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @foreach ($errors->get('email') as $error)
            <div class="text text-danger">
              {{ $error }}
            </div>
          @endforeach
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo !empty(Cookie::get('email')) ? Cookie::get('password') : ''; ?>">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @foreach ($errors->get('password') as $error)
            <div class="text text-danger">
              {{ $error }}
            </div>
          @endforeach
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input name="remember_me[]" type="checkbox" <?php echo !empty(Cookie::get('email')) ? 'checked' : ''; ?> id="remember" value="1">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@stop