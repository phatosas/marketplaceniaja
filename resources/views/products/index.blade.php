@extends('layouts.master')


@section('title')
    All The Product
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href='/css/product_index.css' rel='stylesheet'>
@stop

@section('content')
	<h1> Nigeria's Online Market </h1>

	<blockquote> 
		@foreach($types as $type)
		<a href = '/types/show/{{$type->name}}'> {{ $type->name}} </a>
		@endforeach
	</blockquote>
	
	<h1>All the books</h1>
		@foreach($products as $product)
		<section class='product'>
			<h2>{{ $product->name}}</h2>
			
			<h3> Product type: {{ $product->type->name}}</h3>
			
			<h3> Product location: {{ $product->state->name}}</h3>
			
			@if($product->image_link)
			<a href='/products/show/{{$product->id}}'><img src='{{ $product->image_link }}' alt='Cover for {{ $product->name }}'></a><br>
			@endif
			
			@if($product->image)
			<a href='/products/show/{{$product->id}}'><img src='{{ $product->image }}' alt='Cover for {{ $product->name }}'></a><br>
			@endif
			
			@if (Auth::id() == $product->auth_id)
				<a href='/products/edit/{{$product->id}}'><i class='fa fa-pencil'></i> Edit</a>
				<a href='/products/delete/{{$product->id}}'><i class='fa fa-trash-o fa-lg'></i> Delete</a>
			@endif
				<a href='/products/show/{{$product->id}}'><i class='fa fa-eye'></i> View </a>
		</section>
		@endforeach
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    
@stop