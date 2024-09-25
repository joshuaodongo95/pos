@extends('layouts.app')
@section('title','Edit Brand')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('brands.index') }}">Brands</a></li>
            <li class="breadcrumb-item active">Update brand</li>
        </ul>
        <h1 class="page-header mb-0">Update Brand</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('brands.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> brands</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">
        
    </div>
 </div>
               
<div class="card">
    <div class="card-body">
    <p>Fill in the form below to update brand.</p>
		<form action = "{{ route('brands.update',$brand->id) }}" method="POST" enctype ="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Brand Name <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="name" class="form-control"  value="{{ $brand->name }}">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Category <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <select name="categories[]" class="form-select" multiple>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value ="{{$category->id}}" selected> {{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<small class="text-danger">{{$message}}</small>@enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="3">{{ $brand->description }}</textarea>
                    @error('description')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Image <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
						<img alt="" class="mw-100 mh-100" src="{{asset('/uploads/'.$brand->image)}}">
					</div>
                    <input type="file" id="image" name="image" class="form-control"  value="{{ $brand->image }}">
                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                </div>
			</div>
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status <small class="text-danger"> * </small></label>
                <div class="col-sm-10">
                    <input type = "checkbox" name="status" /> Checked Hidden,  Unchecked Visible
                </div>
            </div>
            <div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<button type="submit" class="btn btn-outline-theme">Update</button>
				</div>
			</div>
        </form>
    </div>
</div>
@endsection