@extends('layouts.master')

@section('title')
	Add a new book
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')

	<h2>Add a new product</h2>
	
	<form method='POST' action='/products/create' enctype='multipart/form-data'>
	<input type='hidden' name='user_id' value='{{ Auth::user()->id}}'>
	
		{{ csrf_field() }}
	
		<div class='form-group'>
			<label for name>* Name:</label>
			<ul class='errors'>
			<li>{{ $errors->first('name') }}</li><br>
			</ul>
			<input
				type='text'
				id='name'
				name='name'
				value='{{ old('name') }}'
			>
		</div>
		
		<div class='form-group'>
			<label for='state_id'>* State:</label>
			<ul class='errors'>
			<li>{{ $errors->first('state_id') }}</li><br>
			</ul>
			<select id='state_id' name='state_id'>
				@foreach($states_for_dropdown as $state_id => $state_name)
					<option value='{{$state_id}}'>
						{{$state_name}}
					</option>
				@endforeach			
			</select>
		</div>
		
		<div class='form-group'>
			<label for='type_id'>* Type:</label>
			<ul class='errors'>
			<li>{{ $errors->first('type_id') }}</li><br>
			</ul>
			<select id='type_id' name='type_id'>
				@foreach($types_for_dropdown as $type_id => $type_name)
					<option value='{{$type_id}}'>
						{{$type_name}}
					</option>
				@endforeach			
			</select>
		</div>

		
		<div class='form-group'>
			<label>* URL of product image:</label>
			<ul class='errors'>
			<li>{{ $errors->first('image_link') }}</li><br>
			</ul>
			<input
				type='text'
				id='image_link'
				name='image_link'
				value='{{ old('image_link') }}'
			>
		</div>
		
		<div class='form-group'>
			<label>Upload Image:</label>
			<ul class='errors'>
			<li>{{ $errors->first('image') }}</li><br>
			</ul>
			<fieldset>
			<input
				type='file'
				id='image'
				name='image'
			>
			</fieldset>
		</div>
		
		<div class='form-group'>
			<label>* Description: </label>
			<textarea name="description" COLS=40 ROWS=6>Enter text here...</textarea>
		</div>
		
		<button type="submit" class="btn btn-primary">Add product</button><br>
		<ul class='errors'>
		@if(count($errors) > 0)
			<li>Please correct the errors above and try again.</li>
		@endif
		</ul>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
