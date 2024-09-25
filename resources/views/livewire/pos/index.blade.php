<div>
	<!-- BEGIN pos-content -->
	<div class="pos-content">
		<div class="pos-content-container h-100">
			<div class="row gx-4">
				@if(!empty($products))
					@foreach($products as $product)
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-4">
							<a href="#" class="pos-product" data-bs-toggle="modal" data-bs-target="#modalPosItem">
								<div class="img" style="background-image: url({{ asset('uploads/'.$product->image) }})"></div>
								<div class="info">
									<div class="title">{{$product->name}}&reg;</div>
									<div class="desc">{{$product->description}}</div>
									<div class="price">
										${{$product->selling_price}}					
									</div>
									<div class="d-grid">
										@if($items->where('id',$product->id)->count())
											<button wire:click="removeFromCart({{$product->id}})" type="button" class="btn btn-danger">
												<span wire:loading.remove wire:target="removeFromCart">
													<i class="fa fa-shopping-cart"></i>
												</span>
												<span wire:loading wire:target="removeFromCart">Removing...</span>
											</button>
										@else
											<button wire:click="addToCart({{$product->id}})" type="button" class="btn btn-primary">
												<span wire:loading.remove wire:target="addToCart">
													<i class="fa fa-shopping-cart"></i>
												</span>
												<span wire:loading wire:target="addToCart">Adding...</span>
											</button>
										@endif
									</div>
								</div>
							</a>
						</div>
					@endforeach
				@else
					<div class="col-md-12">
						<div class="p-2">
							<h4> No Products Available</h4>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
	<!-- END pos-content -->
</div>