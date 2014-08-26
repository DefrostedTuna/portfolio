@extends('layout.main')

@section('title')
	Register
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Register a new account</h1>
		<hr>
		<p>Please enter the user's information</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="content bg il-block">
	<form action="{{ URL::route('account-create') }}" method="post">
		


	<div class="center-text padding-vertical">
		<label for="email">Email: </label>
		<input type="text" name="email" id="email" value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
		<div class="errors">
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>
	</div>

	<div class="center-text padding-vertical">
		<label for="username">Username: </label>
		<input type="text" name="username" id="username" value="{{ (Input::old('username')) ? e(Input::old('username')) : '' }}">
		<div class="errors">
			@if($errors->has('username'))
				{{ $errors->first('username') }}
			@endif
		</div>
	</div>

	<div class="center-text padding-vertical">
		<label for="password">Password: </label>
		<input type="password" name="password" id="password" value="">
		<div class="errors">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
	</div>

	<div class="center-text padding-vertical">
		<label for="confirm_password">Confirm your password: </label>
		<input type="password" name="confirm_password" id="confirm_password" value="">
		<div class="errors">
			@if($errors->has('confirm_password'))
				{{ $errors->first('confirm_password') }}
			@endif
		</div>
	</div>

	<br>

	<div class="center-text padding-vertical">
		<input type="submit" class="btn btn-primary" value="Create account">
		{{ Form::token() }}
	</div>
	</form>
</div>
@stop