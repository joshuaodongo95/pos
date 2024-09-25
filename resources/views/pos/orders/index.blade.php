@extends('layouts.app')
@section('title','orders')
@section('content')
<div class="row">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ul>
            <h1 class="page-header mb-0">My Orders</h1>
        </div>
        <div class="ms-auto">
            <a href="{{ url('pos') }}" class="btn btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Create</a>
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
                                        <th >Order ID</th>
                                        <th >Client</th>
                                        <th >Phone</th>
                                        <th >Total Price</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>#00{{$order->id}}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->customer_phone }}</td>
                                            <td>{{ $order->total_price}}</td>
                                            <td>{{ $order->status}}</td>
                                            <td>
                                                <a href="#" class="btn btn-theme btn-sm" >Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">  No Orders Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">
                                {!! $orders->links() !!}
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