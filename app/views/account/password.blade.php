@extends('layout.main')

@section('title')
	Change Password
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Change password</h1>
		<hr>
		<p>Please fill out the form to continue</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="content bg il-block">
 <form action="{{ URL::route('account-change-password') }}" method="post">
		<div class="padding-vertical center-text">
			<label for="current_password">Current Password: </label>
			<input type="password" name="current_password" id="current_password">
			<div class="errors">
			@if($errors->has('current_password'))
				{{ $errors->first('current_password') }}
			@endif	
			</div>
		</div>

		<div class="padding-vertical center-text">
			<label for="new_password">New Password: </label>
			<input type="password" name="new_password" id="new_password">
			<div class="errors">
			@if($errors->has('new_password'))
				{{ $errors->first('new_password') }}
			@endif	
			</div>
		</div>

		<div class="padding-vertical center-text">
			<label for="confirm_new_password">Confirm password: </label>
			<input type="password" name="confirm_new_password" id="confirm_new_password">
			<div class="errors">
			@if($errors->has('confirm_new_password'))
				{{ $errors->first('confirm_new_password') }}
			@endif
			</div>
		</div>

		<br>
		
		<div class="padding-vertical center-text">
		 	<input type="submit" class="btn btn-primary" value="Change password">
		 	{{ Form::token() }}
		</div>
 </form>
</div>
@stop