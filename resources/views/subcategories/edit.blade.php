@extends('layouts.app')
@section('title','Edit Subcategory')
@section('content')
<div class="d-flex align-items-center mb-3">
    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('subcategories.index') }}">Sub Categories</a></li>
            <li class="breadcrumb-item active">Edit Sub Category</li>
        </ul>
        <h1 class="page-header mb-0">Edit Sub Category</h1>
    </div>
                    
    <div class="ms-auto">
        <a href="{{ route('subcategories.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Sub Categories</a>
    </div>
</div>
<div class="mb-md-4 mb-3 d-md-flex">
    <div class="mt-md-0 mt-2">
        
    </div>
 </div>
               
<div class="card">
    <div class="card-body">
    <p>Fill in the form below to create a product sub category.</p>
		<form action = "{{ route('subcategories.update',$subcategory->id) }}" method="POST" enctype ="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Category <small class="text-danger"> * </small></label>
                    <select name="category" class="form-select" >
                        <option value=""> Select Catgory</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($category->category_id == $category->id) selected @endif > {{$category->name}} </option>
                            @endforeach
                    </select>
                    @error('category')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <small class="text-danger"> * </small></label>
                    <input type="text" id="name" name="name" class="form-control"  value="{{ $subcategory->name }}">
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
					<label class="form-label" for="description">Description</label>
					<textarea class="form-control" id="description" name="description" rows="3" >{{ $subcategory->description }}</textarea>
				</div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image<small class="text-danger"> * </small></label>
                    <div class="w-60px h-60px bg-gray-100 d-flex align-items-center justify-content-center">
						<img alt="" class="mw-100 mh-100" src="{{asset('/uploads/'.$subcategory->image)}}">
					</div>
                    <input type="file" id="image" name="image" class="form-control"  value="{{ $subcategory->image }}">
                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label" >Status</label>
                    </br>
                    <input type = "checkbox" name="status" {{ $subcategory->status=='1' ? 'checked' : ''}} /> Checked Hidden,  Unchecked Visible
                </div>
                <p>Search Engine Optimization Tags.</p>
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title <small class="text-danger"> * </small> </label>
                    <input type="text" id="meta-title" name="meta_title" class="form-control" value="{{ $subcategory->meta_title }}" >
                    @error('meta_title')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keyword" class="form-label">Meta Keyword <small class="text-danger"> * </small> </label>
                    <textarea name="meta_keyword" id="meta_keyword"  class="form-control" rows="3" >{{ $subcategory->meta_keyword }}</textarea>
                    @error('meta_keyword')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description <small class="text-danger"> * </small> </label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="3" >{{ $subcategory->meta_description }}</textarea>
                    @error('meta_description')<small class="text-danger">{{$message}}</small>@enderror
                </div>
                <div class="col-sm-12 mb-3">
					<button type="submit" class="btn btn-outline-theme">Update</button>
				</div>
            </div>
        </form>
    </div>
</div>
@endsection