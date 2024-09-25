@extends('layouts.default')
@section('title','Partner Login')
@section('content')
<!-- Login 13 - Bootstrap Brain Component -->
<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <h2> Login</h2>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                        <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="d-flex gap-2 justify-content-between">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                        <label class="form-check-label text-secondary" for="rememberMe">
                            Keep me logged in
                        </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="d-grid my-3">
                        <button class="btn btn-primary" type="submit">Log in</button>
                    </div>
                    </div>
                </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection