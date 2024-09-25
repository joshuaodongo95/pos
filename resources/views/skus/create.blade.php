@extends('layouts.app')
@section('title','Create product SKU')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('skus.index') }}">SKUS</a></li>
            <li class="breadcrumb-item active">Add product SKU</li>
        </ul>
        <h1 class="page-header mb-0">Add product SKU</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('skus.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> brands</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">     
    </div>
 </div>
               
<div class="card">
    <div class="card-body">
    <p>Fill in the form below to create a brand.</p>
		<form action = "{{ route('skus.store') }}" method="POST" enctype ="multipart/form-data">
            @csrf 
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"> Sub Category <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <select id="categories" name="subcategories[]" multiple class="form-control">
                    </select>
                    @error('categories.*')<small class="text-danger">{{$message}}</small>@enderror
                </div>
            </div>        
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Image <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <input type="file" id="image" name="image" class="form-control"  value="{{ old('image') }}">
                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <input type = "checkbox" name="status" />  Checked Hidden, Unchecked Visible
                </div>
            </div>
            <div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<button type="submit" class="btn btn-outline-theme">Save Brand</button>
				</div>
			</div>
        </form>
    </div>
</div>
@endsection
