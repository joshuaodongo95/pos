@extends('layouts.default')
@section('title','Create an Acount')
@section('content')
<!-- Registration 13 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <h2> Create an Account </h2>
            </div>
            <form action="{{ route('register') }}" method="POST">
              @csrf 
            <div class="row mb-1">
              <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
              <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="Full Name" value="{{ old('name') }}" autocomplete="Name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-1">
              <label for="email" class="col-md-4 col-form-label">{{ __('Email address') }}</label>
              <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="name" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-1">
                <label for="password" class="form-label">Password</label>
                  <div class="col-md-12">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" >
                    
                  </div>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="row mb-1">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                  <div class="col-md-12">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" >
                    
                  </div>
                  @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="col-12">
                <div class="d-grid my-3">
                  <button class="btn btn-primary" type="submit">Sign up</button>
                </div>
              </div>
              <div class="col-12">
                <p class="m-0 text-secondary text-center">Already have an account ? <a href="{{route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection