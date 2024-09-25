<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item active">
						<a href="{{ url('/home') }}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-home"></i></span>
							<span class="menu-text">Dashboard</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="{{ url('/pos') }}" class="menu-link">
						<span class="menu-icon"><i class="fa fa-shopping-cart"></i></span>
							<span class="menu-text">POS</span>
						</a>
					</div>
					<div class="menu-item ">
						<a href="{{ url('/pos/orders') }}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-th-list"></i></span>
							<span class="menu-text">My Orders</span>
						</a>
					</div>
					<div class="menu-item ">
						<a href="{{ url('/products') }}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-th-list"></i></span>
							<span class="menu-text">Products</span>
						</a>
					</div>
                    <div class="menu-item">
						<a href="{{ url('/orders') }}" class="menu-link">
							<span class="menu-icon"><i class="fa fa-bars"></i></span>
								<span class="menu-text">Orders</span>
							</a>
					</div>
					<div class="menu-item">
						<a href="#" class="menu-link">
						<span class="menu-icon"><i class="fa fa-usd"></i></span>
							<span class="menu-text">Payments</span>
						</a>
					</div>
					<div class="menu-divider"></div>
					<div class="menu-header">User Management</div>
					<div class="menu-item">
						<a href="{{ url('/users') }}" class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-users"></i>
							</span>
							<span class="menu-text">Users</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="{{ url('/roles') }}" class="menu-link">
						<span class="menu-icon"><i class="fa fa-laptop"></i></span>
							<span class="menu-text">Roles</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="{{ url('/permissions') }}" class="menu-link">
						<span class="menu-icon"><i class="fa fa-laptop"></i></span>
							<span class="menu-text">Permissions</span>
						</a>
					</div>
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
			
			<!-- BEGIN mobile-sidebar-backdrop -->
			<button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
			<!-- END mobile-sidebar-backdrop -->
		</div>
		<!-- END #sidebar -->