@extends('layout.main')

@section('title')
	Edit user information
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Edit user information</h1>
		<hr>
		<p>Need to change something?</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="content bg il-block">
	<form action="{{ URL::route('users-edit-single', $user->id) }}" method="post">
		


	<div class="center-text padding-vertical">
		<label for="email">Email: </label>
		<input type="text" name="email" id="email" value="{{ (Input::old('email')) ? e(Input::old('email')) : $user->email }}">
		<div class="errors">
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>
	</div>


	<div class="center-text padding-vertical">
		<label for="first_name">First Name: </label>
		<input type="text" name="first_name" id="first_name" value="{{ (Input::old('first_name')) ? e(Input::old('first_name')) : $user->first_name }}">
		<div class="errors">
			@if($errors->has('first_name'))
				{{ $errors->first('first_name') }}
			@endif
		</div>
	</div>


	<div class="center-text padding-vertical">
		<label for="last_name">Last Name: </label>
		<input type="text" name="last_name" id="last_name" value="{{ (Input::old('last_name')) ? e(Input::old('last_name')) : $user->last_name }}">
		<div class="errors">
			@if($errors->has('last_name'))
				{{ $errors->first('last_name') }}
			@endif
		</div>
	</div>

	<div class="center-text padding-vertical">
		<label for="bio">Bio: </label>
		<textarea name="bio" id="bio">
			{{ (Input::old('bio')) ? e(Input::old('bio')) : $user->bio }}
		</textarea>
		<div class="errors">
			@if($errors->has('bio'))
				{{ $errors->first('bio') }}
			@endif
		</div>
	</div>



	<br>

	<div class="center-text padding-vertical">
		<input type="submit" class="btn btn-primary" value="Update Information">
		{{ Form::token() }}
	</div>
	</form>
</div>
@stop