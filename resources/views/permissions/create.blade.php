@extends('layouts.app')
@section('title','Create Brand')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Create Role</li>
        </ul>
        <h1 class="page-header mb-0">Create Role</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('roles.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Roles</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">     
    </div>
 </div>
<div class="card">
    <div class="card-body">
        <form action="{{ url('roles') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="">Permission Name</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection