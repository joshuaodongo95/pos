@extends('layouts.app')
@section('title','Edit Category')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('categories.index') }}">Categories</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
        </ul>
        <h1 class="page-header mb-0">Edit Category</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('categories.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Categories</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">
        
    </div>
 </div>
               
<div class="card">
    <div class="card-body">
    <p>Fill in the form below to create a product category.</p>
		<form action = "{{ route('categories.update',$category->id) }}" method="POST" enctype ="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Name <small class="text-danger"> * </small></label>
                    <input type="text" id="name" name="name" class="form-control"  value="{{ $category->name }}">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
					<label class="form-label" for="description">Description</label>
					<textarea class="form-control" id="description" name="description" rows="3" >{{ $category->description }}</textarea>
				</div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image<small class="text-danger"> * </small></label>
                    <div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
						<img alt="" class="mw-100 mh-100" src="{{asset('/uploads/'.$category->image)}}">
					</div>
                    <input type="file" id="image" name="image" class="form-control"  value="{{ $category->image }}">
                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label" >Status</label>
                    </br>
                    <input type = "checkbox" name="status" {{ $category->status=='1' ? 'checked' : ''}} /> Checked Hidden,  Unchecked Visible
                </div>
                <div class="col-sm-12 mb-3">
					<button type="submit" class="btn btn-outline-theme">Update</button>
				</div>
            </div>
        </form>
    </div>
</div>
@endsection