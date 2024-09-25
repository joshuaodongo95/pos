@extends('layouts.app')
@section('title','Create user')
@section('content')
	<div class="d-flex align-items-center mb-3">
		<div>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item "><a href="{{ route('users.index') }}">users</a></li>
				<li class="breadcrumb-item active">Create User</li>
			</ul>
			<h1 class="page-header mb-0">Create User </h1>
		</div>
						
		<div class="ms-auto">
			<a href="{{ route('users.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Users</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<form action = "{{ route('users.store') }}" method="POST" enctype ="multipart/form-data" >
				@csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name <small class="text-danger"> * </small></label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}">
                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
			    </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email Address <small class="text-danger"> * </small></label>
                    <div class="col-sm-10">
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}">
                        @error('email')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
			    </div>
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone <small class="text-danger"> * </small></label>
                    <div class="col-sm-10">
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}">
                        @error('phone')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
			    </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password<small class="text-danger"> * </small></label>
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}">
                        @error('password')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
			    </div>
                <div class="mb-3 row">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password<small class="text-danger"> * </small></label>
                    <div class="col-sm-10">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"  value="{{ old('confirm_password') }}">
                        @error('password_confirmation')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
			    </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Role </label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach ($roles as $role)
                                <div class="col-md-2">
                                    <label> 
                                        <input type="checkbox" name="roles[]" value="{{ $role->name}}"/>
                                        {{ $role->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles.*')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-outline-theme">Save</button>
                    </div>
			    </div>
            </form>
		</div>
	</div>
@endsection