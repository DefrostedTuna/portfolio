@extends('layout.main')

@section('title')
	Forgot Password
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Forgot your password?</h1>
		<hr>
		<p>Don't worry, we've got your back</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="content bg il-block">
	<form action="{{ URL::route('account-forgot-password') }}" method="post">
		<div class="center-text padding-vertical">
			<label for="email">Email: </label>
			<input type="text" name="email" id="email" value="{{ (Input::old('email')) ? e(Input::old('email')) : '' }}">
			<div class ="errors">
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>
		</div>
		
		<br>
		
		<div class="center-text padding-vertical">
			<input type="submit" class="btn btn-primary" value="Recover account">
			{{ Form::token() }}
		</div>
	</form>
</div>
@stop