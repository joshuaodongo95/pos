@extends('layouts.app')
@section('title','Create Subcategory')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('subcategories.index') }}">Sub Categories</a></li>
            <li class="breadcrumb-item active">Add Sub Category</li>
        </ul>
        <h1 class="page-header mb-0">Add Sub Category</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('subcategories.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i>Sub Categories</a>
    </div>
</div>
               
<div class="card">
    <div class="card-body">
        
    <p>Fill in the form below to create a product category.</p>
		<form action = "{{ route('subcategories.store') }}" method="POST" enctype ="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Category <small class="text-danger"> * </small></label>
                    <select name="category" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    @error('category')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <small class="text-danger"> * </small></label>
                    <input type="text" id="name" name="name" class="form-control"  value="{{ old('name') }}">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
					<label class="form-label" for="description">Description</label>
					<textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
				</div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image<small class="text-danger"> * </small></label>
                    <input type="file" id="image" name="image" class="form-control"  value="{{ old('image') }}">
                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    </br>
                    <input type = "checkbox" name="status" /> Checked Hidden,  Unchecked Visible
                </div>
                <p>Search Engine Optimization Tags.</p>
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title <small class="text-danger"> * </small> </label>
                    <input type="text" id="meta-title" name="meta_title" class="form-control" value="{{ old('meta_title') }}" >
                    @error('meta_title')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keyword" class="form-label">Meta Keyword <small class="text-danger"> * </small> </label>
                    <textarea name="meta_keyword" id="meta_keyword"  class="form-control" rows="3">{{old('meta_keyword')}}</textarea>
                    @error('meta_keyword')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description <small class="text-danger"> * </small> </label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="3">{{old('meta_description')}}</textarea>
                    @error('meta_description')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-sm-12 mb-3">
					<button type="submit" class="btn btn-outline-theme">Save Sub Category</button>
				</div>
            </div>
        </form>
    </div>
</div>
@endsection