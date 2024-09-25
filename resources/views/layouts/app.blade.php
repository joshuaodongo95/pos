<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'POS') }} | @yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
	<!-- ================== END core-css ================== -->
	 
	@stack('css')
    @livewireStyles
	
</head>
<body>
    <!-- BEGIN #app -->
	<div id="app" class="app">
		@include('header')
		@include('sidebar')

        <!-- BEGIN #content -->
		<div id="content" class="app-content">
            @yield('content')
			@include('scroll-top-btn')
        </div>
    </div>
	<!-- END #app -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- ================== BEGIN core-js ================== -->
	<script src="{{ asset('js/vendor.min.js')}}"></script>
	<script src="{{ asset('js/app.min.js')}}"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<!-- ================== END page-js ================== -->
    @livewireScripts
	@stack('scripts')
</body>
</html>
