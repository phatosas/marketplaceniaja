@extends('layouts.master')


@section('title')
    Marketplaceniaja
@stop

@section('head')
	<link href='/css/marketplaceniaja.css' rel='stylesheet'>
@stop

@section('content')
	<h1> Nigeria's Online Market </h1>

	<blockquote> 
		@foreach($types as $type)
		<a href = '/types/show/{{$type->name}}'> {{ $type->name}} </a>
		@endforeach
	</blockquote>
	
	<div class="container">
		<div id="sidebar">		
			<p><a href = "Deals.html"> Deals </a></p>
			<p><a href = "Bids.html"> Bids </a></p>
			<p><a href = "Delivery.html"> Delivery </a></p>
			<p><a href = "ReturnPolicy.html"> Return Policy </a></p>
			<p><a href = "ContactUs.html"> Contact Us </a></p>
		</div>
	</div>
	

	<table id="stateTable" style="width:80%" align ="center" >
		<tr> 
			<td><li> <a href='/states/show/Anambra'> Anambra </a></li></td> 
			<td><li> <a href='/states/show/Akwa Ibom'> Akwa Ibom </a></li></td> 
			<td><li> Adamawa </li> </td>  
			<td> <li> Abia </li> </td> 
		</tr> 
	 
		<tr>
			<td><li> Abuja </li></td> 
			<td><li> Bauchi </li></td> 
			<td><li> Bayelsa </li></td> 
			<td><li> Benue </li></td>
		</tr>
	 
		<tr>
			<td><li> Borno </li></td> 
			<td><li> Cross River </li></td>
			<td><li> Delta </li></td> 
			<td><li> Ebonyi </li></td> 	
		</tr>
	 
		<tr> 
			<td><li> Edo </li></td> 
			<td><li> Ekiti </li></td> 
			<td><li> Enugu </li></td>
			<td><li> Gombe </li></td> 
		</tr>

		<tr>
			<td><li> Imo </li></td>
			<td><li> Jigawa </li></td> 
			<td><li> Kaduna </li></td>
			<td><li> Kano </li></td>
		</tr>

		<tr>
			<td><li> Katsina </li></td> 
			<td><li> Kebbi </li></td> 
			<td><li> Kogi </li></td> 
			<td><li> Kwara </li></td>
		</tr>

		<tr> 
			<td><li> Lagos </li></td> 
			<td><li> Nasarawa </li></td> 
			<td><li> Niger </li></td>
			<td><li> Ogun </li></td>
		</tr>

		<tr>
			<td><li> Ondo </li></td> 
			<td><li> Osun </li></td> 
			<td><li> Oyo </li></td>
			<td><li> Plateau </li></td>
		</tr>

		<tr> 
			<td><li> Rivers </li></td> 
			<td><li> Sokoto </li></td> 
			<td><li> Taraba </li></td> 
			<td><li> Yobe </li></td> 
		</tr>

		<tr> 
			<td><li> Zamfara </li></td> 
		</tr>
	</table>

@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
