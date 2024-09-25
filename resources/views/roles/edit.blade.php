@extends('layouts.app')
@section('title','Update Role')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Update Role</li>
        </ul>
        <h1 class="page-header mb-0">Update Role</h1>
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
        <form action="{{ url('roles/'.$role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">Role Name</label>
                <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
            </div>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-2">
                        <label> 
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}/>
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection