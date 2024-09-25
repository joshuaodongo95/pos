@extends('layouts.app')
@section('title','Attributes')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Attributes</li>
            </ul>
            <h1 class="page-header mb-0">Attributes</h1>
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
                                <thead>
                                    <tr>
                                        <th ></th>
                                        <th >Attribute</th>
                                        <th >Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($attributes as $attribute)
                                        <tr>
                                            <td>{{ $attribute->id }}</td>
                                            <td>{{$attribute->name}}</td>
                                            <td>
                                                @foreach ($attribute->attributeOptions as $option)
                                                    {{$option->value}},
                                                @endforeach
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">  No Attributes Found</td>
                                        </tr>
                                    @endforelse
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