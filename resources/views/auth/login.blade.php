@extends('master')

@section('page')
Sign In
@endsection

@section('content')
<div class="register-area section-padding-120-70">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <!-- Register Thumbnail-->
      <div class="d-none d-lg-block col-12 col-lg-6">
        <div class="register-thumbnail mb-50"><img src="{{asset('storage/bg/login.png')}}" alt=""></div>
      </div>
      <!-- Register Card-->
      <div class="col-12 col-lg-6">
       @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card register-card bg-gray p-1 p-sm-4 mb-50">
          <div class="card-body">
            <h4>Welcome Back!</h4>
            <!-- Register Form-->
            <div class="register-form mt-3 mb-2">
              <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                  <input name="email" class="form-control rounded-0" type="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                  <label class="label-psswd" for="password">
                    <span class="hide">HIDE</span>
                    <span class="show">SHOW</span>
                  </label>
                  <input name="password" class="input-psswd form-control rounded-0" id="password" type="password" placeholder="Password"
                    psswd-shown="false" required>
                </div>
                <button class="btn radix-btn white-btn w-100" type="submit">
                  <i class="lni-unlock mr-2"></i>
                  Login</button>
              </form>
              <div class="login-meta-data d-flex align-items-center justify-content-between">
                <div class="custom-control custom-checkbox mt-3 mr-sm-2">
                  <input class="custom-control-input" id="rememberMe" type="checkbox">
                  <label class="custom-control-label" for="rememberMe">Keep me logged in</label>
                </div>
                <a class="forgot-password mt-3" href="{{route('forgot.password')}}">Forgot Password?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection