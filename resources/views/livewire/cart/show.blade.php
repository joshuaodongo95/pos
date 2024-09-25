<div>
    <!-- BEGIN pos-sidebar -->
	<div class="pos-sidebar" id="pos-sidebar">
		<div class="h-100 d-flex flex-column p-0">
			<!-- BEGIN pos-sidebar-header -->
			<div class="pos-sidebar-header p-5 ">
				<div class="back-btn">
					<button type="button" data-toggle-class="pos-mobile-sidebar-toggled" data-toggle-target="#pos" class="btn">
						<i class="fa fa-chevron-left"></i>
					</button>
				</div>
			</div>
			<!-- END pos-sidebar-header -->
								
			<!-- BEGIN pos-sidebar-body -->
			<div class="pos-sidebar-body" data-scrollbar="true" data-height="100%">
				<!-- BEGIN #newOrderTab -->
				@if(count(\Cart::getContent()) > 0)	
					<!-- BEGIN pos-order -->
					@foreach($items as $item)
					<div class="pos-order">
						<div class="pos-order-product">
							<div class="img" style="background-image: url({{ asset('uploads/'.$item->attributes->image) }})"></div>
							<div class="flex-1">
								<div class="h6 mb-1">{{ $item->name }}</div>
								<div class="small">${{$item->price}}</div>
								<div class="small mb-2"></div>
								<div class="d-flex">
									<button type="button" wire:click="decrementQty({{ $item->id }})" class="btn btn-primary btn-sm"> <i class="fa fa-minus"></i> </button>
                                    <input type="text" value="{{ $item->quantity}}" class="small" />
                                    <button type="button" wire:click="incrementQty({{$item->id }})" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
						<div class="pos-order-price d-flex flex-column">
							<div class="flex-1">${{$item->getPriceSum() }}</div>
							<div class="text-end">
								<button type="button" wire:loading.attr="disabled" wire:click.prevent="removeFromCart({{ $item->id}})" class="btn btn-danger btn-sm">
                                    <span wire:loading.remove wire:target="removeFromCart({{ $item->id }})">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                	<span wire:loading wire:target="removeCartItem({{ $item->id }})"> Removing...</span>
                                </button>
							</div>
						</div>
					</div>
					@endforeach
					<!-- END pos-order -->
				@else
					<div>
						<div class="h-100 d-flex align-items-center justify-content-center text-center p-5">
							<div>
								<div class="mb-3 mt-n5">
									<svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z"/>
										<path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z"/>
									</svg>
								</div>
								<h5>Order is empty</h5>
							</div>
						</div>
					</div>
				@endif
			</div>
			<!-- END pos-sidebar-body -->
								
			<!-- BEGIN pos-sidebar-footer -->
			@if(count(\Cart::getContent()) > 0)
				<div class="pos-sidebar-footer">
					<div class="d-flex align-items-center mb-2">
						<div>Subtotal</div>
						<div class="flex-1 text-end h6 mb-0">${{ Cart::getSubTotal() }}</div>
					</div>
					<hr class="opacity-1 my-10px">
					<div class="d-flex align-items-center mb-2">
						<div>Total</div>
						<div class="flex-1 text-end h4 mb-0">${{ Cart::getTotal()}}</div>
					</div>
					<div class="mt-3">
						<div class="d-flex">
							<button type="button" class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-center" wire:click.prevent="clearCart">Clear Cart</button>
							<a href="{{ route('orders.create') }}" class="btn btn-theme flex-fill d-flex align-items-center justify-content-center">
								<span>
									<i class="fa fa-cash-register fa-lg my-10px d-block"></i>
									<span class="small fw-semibold">Proceed to Order</span>
								</span>
							</a>
						</div>
					</div>
				</div>
			@else
				<div class="mb-3">
					<div class="card-body">
						<div class="row g-3">
							<div class="text-center">
								<h2>Cart is empty</h2>
							</div>
						</div>
					</div>
				</div>
			@endif
			<!-- END pos-sidebar-footer -->
		</div>
	</div>
	<!-- END pos-sidebar -->
</div>

