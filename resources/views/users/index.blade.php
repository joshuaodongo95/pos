@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ul>
            <h1 class="page-header mb-0">Users</h1>
        </div>
        <div class="ms-auto">
            <a href="{{ route('users.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Create</a>
        </div>
        
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <p>{{ \Session::get('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div id="datatable" class="mb-5">        
            <div class="card">
            
                <div class="card-body"> 
                        <div class="table-responsive">
                            <table id="datatableDefault" class="table text-nowrap w-100">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $val)
                                                        <span class="badge text-bg-dark">{{ $val }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="float-right">
                                                @can('user-edit')
                                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                @endcan
                                                @can('user-delete')
                                                    <a class="btn btn-danger btn-sm" href="{{ route('users.destroy',$user->id) }}">Delete</a>
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
    </div>
</div>
@endsection