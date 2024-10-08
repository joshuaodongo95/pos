@extends('layouts.app')
@section('title','Create Product')
@section('content')
	<div class="d-flex align-items-center mb-3">
		<div>
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item "><a href="{{ route('products.index') }}">Products</a></li>
				<li class="breadcrumb-item active">Edit Product</li>
			</ul>
			<h1 class="page-header mb-0">Edit Product</h1>
		</div>
						
		<div class="ms-auto">
			<a href="{{ route('products.index') }}" class="btn btn-theme"><i class=" fa-fw me-1"></i> Products</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
            <form action = "{{ route('products.update',$product->id) }}" method="POST" enctype ="multipart/form-data">
                @csrf
                @method('PUT')
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"> Product Information </button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-pane" type="button" role="tab" aria-controls="images-tab-pane" aria-selected="false" >Product Images</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="package-tab" data-bs-toggle="tab" data-bs-target="#package-tab-pane" type="button" role="tab" aria-controls="package-tab-pane" aria-selected="false" >Package Details</button>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
						<div>
							<br>
						</div>
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label class="form-label">Title <span class="text-danger">*</span></label>
										<input type="text" name="name" class="form-control"  placeholder="Product name" value="{{ $product->name }}" />
										@error('name')<small class="text-danger">{{$message}}</small>@enderror
									</div>
									<div class="col-md-12 mb-3">
										<label class="form-label">Description <span class="text-danger">*</span></label>
										<textarea name="description" class="form-control" rows="4" >{{ $product->description }}</textarea>
										@error('description')<small class="text-danger">{{$message}}</small>@enderror
									</div>				
									<div class="col-md-6 mb-3">
										<label class="form-label">Original price <span class="text-danger">*</span></label>
										<input type="text" name="default_price" class="form-control"  placeholder="Original price" value="{{ $product->default_price }}" >
										@error('default_price')<small class="text-danger">{{$message}}</small>@enderror
									</div>
									<div class="col-md-6 mb-3">
										<label class="form-label">Selling price <span class="text-danger">*</span></label>
										<input type="text" name="selling_price" class="form-control"  placeholder="Selling Price" value="{{ $product->selling_price }}">
										@error('selling_price')<small class="text-danger">{{$message}}</small>@enderror
									</div>
									<div class="col-md-6 mb-3">
										<label class="form-label">Product Brand <span class="text-danger">*</span></label>
										<select name="brand" class="form-select" >
											<option value="">Select Product Brand</option>
                                            @foreach($brands as $brand)
                                                <option value ="{{$brand->id}}" @if($product->brand_id == $brand->id) selected @endif> {{$brand->name}}</option>
                                            @endforeach 
										</select>
										@error('brand')<small class="text-danger">{{$message}}</small>@enderror
									</div>
									<div class="col-md-6 mb-3">
										<label class="form-label">Category <span class="text-danger">*</span></label>
										<select name="category" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value ="{{$category->id}}" @if($product->category_id == $category->id) selected @endif > {{$category->name}}</option>
                                            @endforeach
                                        </select>
										@error('category')<small class="text-danger">{{$message}}</small>@enderror
									</div>	
									<div class="col-md-6 mb-3">
										<label for="is_active" class="form-label">Active Status</label>
										<input type = "checkbox" name="is_active" class="form-check-input"  value="{{ $product->is_active }}" @if($product->is_active == 1) checked @endif />
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="tab-pane fade" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab" tabindex="0">
						<div>
							</br>
						</div>
						<div class="card mb-4">
							<div class="card-body">
								<div class="mb-3">
									<label class="form-label">Add Product Images</label>
									<input type="file" name="image" class="form-control" value="{{ old('image') }}" />

									@error('image')<small class="text-danger">{{$message}}</small>@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="package-tab-pane" role="tabpanel" aria-labelledby="packages-tab" tabindex="0">
						<div>
							</br>
						</div>
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Quantity</label>
											<input type="text" name="quantity"  class="form-control"  value="{{ $product->quantity }}" >
											@error('quantity')<small class="text-danger">{{$message}}</small>@enderror
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Weight</label>
											<input type="text" name="weight" class="form-control"  placeholder="(kg)" value="{{ $product->weight }}">
											@error('weight')<small class="text-danger">{{$message}}</small>@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-outline-theme">Update</button>
					</div>
				</div>
				</br>
			</form>
		</div>
	</div>
@endsection

