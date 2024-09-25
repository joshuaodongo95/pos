@extends('layouts.app')
@section('title','SKUS')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">SKUS</li>
            </ul>
            <h1 class="page-header mb-0">SKUS</h1>
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
                                        <th >Product</th>
                                        <th >Code</th>
                                        <th >Price</th>
                                        <th >Stock</th>
                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($skus as $sku)
                                        <tr>
                                            <td>{{ $sku->product->name }}</td>
                                            <td>{{$sku->code}}</td>
                                            <td>{{$sku->price}}</td>
                                            <td>{{$sku->stock}}</td>
                                            <td>
                                                <a href="{{url('skus/'.$sku->id.'/edit')}}" class="btn btn-theme btn-sm" >Edit</a>
                                                <a href="{{url('skus/'.$sku->id.'/delete')}}" class="btn btn-danger btn-sm" >Delete</a>
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