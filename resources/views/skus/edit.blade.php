@extends('layouts.app')
@section('title','Update variant')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('skus.index') }}">SKUS</a></li>
            <li class="breadcrumb-item active">Update variant</li>
        </ul>
        <h1 class="page-header mb-0">Update variant</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('skus.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Skus</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">     
    </div>
 </div>
               
<div class="card">
    <div class="card-body">
        <form action = "{{ route('skus.update',$sku->id) }}" method="POST" enctype ="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Variant Code</label>
                        <input type="text" name="sku_code" class="form-control" value="{{ $sku->code }}" />
                        @error('sku_code')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">Price</label>
                    <input type="number" name ="sku_price" class="form-control" value="{{ $sku->price }}" />
                    @error('sku_price')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Quantity</label>
                    <input type="number" name ="sku_quantity" class="form-control" value="{{ $sku->stock }}" />
                    @error('sku_quantity')<small class="text-danger">{{$message}}</small>@enderror
                </div>          
            </div>
            <livewire:sku.update-sku />
            <br>      
            <div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-outline-theme">Update</button>
				</div>
			</div>
        </form>
    </div>
</div>
@endsection
