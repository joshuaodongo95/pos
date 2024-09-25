@extends('layouts.app')
@section('title','Roles')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ul>
            <h1 class="page-header mb-0">Roles</h1>
        </div>
        <div class="ms-auto">
            <a href="{{ route('roles.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Create</a>
        </div>
        
    </div>
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <p>{{ \Session::get('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif       
            <div class="card">
            
                <div class="card-body"> 
                        <div class="table-responsive">
                            <table id="datatableDefault" class="table text-nowrap w-100">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th width="40%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if(!empty($role->getPermissionNames()))
                                                @foreach($role->getPermissionNames() as $val)
                                                <span class="badge text-bg-dark">{{ $val }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('update role')
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success btn-sm">
                                                Edit
                                            </a>
                                            @endcan
                                            @can('delete role')
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger mx-2 btn-sm">
                                                Delete
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- END table -->
                    </div>
                </div>
            </div>
</div>
@endsection