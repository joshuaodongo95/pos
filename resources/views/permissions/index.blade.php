@extends('layouts.app')
@section('title','Permissions')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ul>
            <h1 class="page-header mb-0">Permissions</h1>
        </div>
        <div class="ms-auto">
            <a href="{{ route('permissions.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Create</a>
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
                                        <th width="40%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            @can('update permission')
                                                <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                            @endcan

                                            @can('delete permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-end">
                                {!! $permissions->links() !!}
                            </div>
                        </div>
                    <!-- END table -->
                    
                    </div>
                </div>
            </div>
</div>
@endsection