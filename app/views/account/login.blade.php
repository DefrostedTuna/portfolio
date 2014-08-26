@extends('layout.main')

@section('title')
	Log In
@stop

@section('page-header')
	<div class="headWrap center-text">
		<h1>Please log in</h1>
	</div>
@stop

@section('content')
<div class="content bg il-block">
	<form action="{{ URL::route('account-log-in') }}" method="post">
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
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" value="{{ (Input::old('password')) ? e(Input::old('password')) : '' }}">
			<div class="errors">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>
		</div>

		<div class="center-text padding-vertical">
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me </label>
		</div>

		<hr style="border-top: 1px solid black">

		<div class="center-text padding-bottom">
			<input type="submit" class="btn btn-primary" value="Login">
			{{ Form::token() }}
		</div>
	</form>

	<div class="center-text">
		<a href="{{ URL::route('account-forgot-password') }}">Forgot Password?</a>
	</div>

</div>
@stop