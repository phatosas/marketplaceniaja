<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Marketplaceniaja' --}}
        @yield('title','Marketplaceniaja')
    </title>

	<meta charset='utf-8'>
	
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
	
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
	
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
	
	<link href='/css/marketplaceniaja.css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

	@if(Session::get('message') != null)
		<div class='flash_message'>{{ Session::get('message') }}</div>
	@endif

    <header>
		<a href='/'>
        <img
        src='/images/logo/logo.jpg'
        style='width:700px'
        alt='Marketplaceniaja Logo'>
		</a>
		
    </header>
	
	<nav>
        <ul>
            <li><a href='/products'>View all the products</a></li>
            @if(Auth::check())
                <li><a href='/products/search'>Search (with ajax!)</a></li>
                <li><a href='/products/create'>Add a new product</a></li>
                <li><a href='/logout'>Logout</a></li>
            @else
                <li><a href='/login'>Login</a></li>
                <li><a href='/register'>Register</a></li>
            @endif
        </ul>
    </nav>
	
    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} &nbsp;&nbsp;
		<a href='https://github.com/phatosas/marketplaceniaja' class='fa fa-github' target='_blank'> View on Github </a>
		<a href='http://marketplaceniaja.com' class='fa fa-link' target='_blank'> View Live</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
