@extends('layout.main')

@section('title')
	Edit Homepage
@stop

@section('page-header')
	<div class="headWrap center-text">
		<h1>Manage Homepage</h1>
	</div><!--headWrap-->
@stop

@section('content')

<div class="row container-fluid">


	<div class="col-md-8" style="padding: 0px;">
		<div class="center bg padding-all" style="margin-bottom: 20px;">
			<form method="post" action="{{ URL::route('homepage-edit')}}" enctype="multipart/form-data">
			<h3>Headline</h3>
			<div class="field">
				<input type="text" id="headline" name="headline" class="padding-all center-text" style="width:50%"
						value="{{ $homepage->headline }}" placeholder="{{ $homepage->headline }}">	
			</div>
			@if($errors->has('headline'))
				<div class="errors">
					{{ $errors->first('headline') }}
				</div>
			@endif
			
		</div>

		<div class="content bg">
			<h3 class="center">About</h3>
			<hr>


			<div class="field center">	
				@if($errors->has('image'))
					<div class="errors">
						{{ $errors->first('image') }}
					</div>
				@endif
				<div class="padding-bottom">
					<label for="image">Cover image:</label>
					<input type="file" name="image" id="image" class="center" style="background: white; padding: 7px;"><br>
				</div>
				<div class="padding-bottom">
					<input type="checkbox" name="removeImg" id="removeImg" class="btn" style="width: 20px; height: 20px; margin-right: 10px">
					<label for="removeImg" class="il btn btn-danger">Remove image</label>
				</div>
			</div>

			@if($errors->has('about'))
				<div class="errors">
					{{ $errors->first('about') }}
				</div>
			@endif
			<textarea name="about" id="about" style="width: 100%; min-width: 100%; max-width: 100%">
				{{ (Input::old('about')) ? e(Input::old('about')) : e($homepage->about) }}
			</textarea>
			
		</div>
	</div>

	<div class="content bg col-md-3 col-md-offset-1">
		<h3 class="center">Contact info</h3>
			<div class="field center">
				<label for=	"first_name">Name:</label>
				
				@if($errors->has('first_name'))
					<div class="errors">
						{{ $errors->first('first_name') }}
					</div>
				@endif
				<input type="text" id="first_name" name="first_name" value="{{ $homepage->first_name }}" placeholder="First name" class="margin-bottom">
				
				@if($errors->has('last_name'))
					<div class="errors">
						{{ $errors->first('last_name') }}
					</div>
				@endif
				<input type="text" id="last_name" name="last_name" value="{{ $homepage->last_name }}" placeholder="Last name" class="margin-bottom">
				
			</div>
			
			<div class="field center-text">
				<label for="email">Email: </label>
				@if($errors->has('email'))
					<div class="errors">
						{{ $errors->first('email') }}
					</div>
				@endif 
				<input type="text" id="email" value="{{ $homepage->email }}" name="email" placeholder="{{ $homepage->email }}">
				
			</div>

			<div class="field center-text">
				<label for="phone">Phone: </label> 
				@if($errors->has('phone'))
					<div class="errors">
						{{ $errors->first('phone') }}
					</div>
				@endif
				<input type="text" id="phone" value="{{ $homepage->phone }}" name="phone" placeholder="{{ $homepage->phone }}"> 
				
			</div>

			<div class="field center-text">
				<label for="location">Location: </label>
				@if($errors->has('location'))
					<div class="errors">
						{{ $errors->first('location') }}
					</div>
				@endif 
				<input type="text" id="location" value="{{ $homepage->location }}" name="location" placeholder="{{ $homepage->location }}">

		</div>
	
	</div>

</div>
<div class="container col-md-12 center">
		<input type="submit" value="Submit" class="btn btn-primary" style="min-width: 200px">
		{{ Form::token() }}
	</form>
</div>

<div class="content margin-bottom"></div>

@stop