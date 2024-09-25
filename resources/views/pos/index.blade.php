@extends('layouts.app')
@section('title','POS')
@section('content')
    <!-- BEGIN pos -->
    <div class="pos pos-with-sidebar" id="pos">
		<div class="pos-container">
			<livewire:pos.index />
			<livewire:cart.show />
	    </div>
    <div>
	<!-- END pos -->
     <!-- BEGIN pos-mobile-sidebar-toggler -->
	<a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled" data-toggle-target="#pos">
	    <i class="fa fa-shopping-bag"></i>
		<span class="badge">5</span>
	</a>
	<!-- END pos-mobile-sidebar-toggler -->
@endsection