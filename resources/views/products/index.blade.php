@extends('layouts.app')
@section('title','Products')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ul>
            <h1 class="page-header mb-0">Products</h1>
        </div>
        <div class="ms-auto">
            <a href="{{ route('products.create') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add Product</a>
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
                                        <th >Description</th>
                                        <th >Default price</th>
                                        <th >Price</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->default_price}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>
                                                
                                                <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-theme btn-sm" >Edit</a>
                                                <a href="{{url('products/'.$product->id.'/destroy')}}" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">  No Product Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    <!-- END table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection