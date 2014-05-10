@extends('layout.main')

@section('title')
	Manage Users
@stop 

@section('page-header')
<div class="headWrap center-text">
	<h1>Manage Users</h1>
</div>
@stop



@section('content')
<div class="content col-md-12 bg">
<!--<div class="row" style="width: 100%; margin-bottom: 20px;">
		<small class="pull-right btn btn-primary"><a href="{{ URL::route('projects-create') }}" style="color: white; text-decoration: none">New User</a></small>
	</div>
-->
@foreach($users as $user)
		<div class="row center" style="margin-bottom: 10px">

			<div class="row" style="white-space: normal; word-wrap: break-word">	
				<h3 class="il-block word-wrap" style="margin-bottom: 0px"><a class="plain-link-black" href="{{ URL::route('profile-user', $user->username) }}">{{ $user->username }}</a></h3>
			</div>

			<div class="row">
				<small>({{ $user->email }})</small>
			</div>

			<div class="row" style="min-width: 110px;">
				<small class="il">({{ date_format($user->created_at, 'm-d-Y') }})</small>
			</div>

			<div class="spacer"></div>


			<div class="row no-float il-block" style="min-width:160px">
				<a href="{{URL::route('users-edit-single', $user->id)}}" style="text-decoration: none; color: white"><small class="btn btn-primary">Edit</small></a>
				<a href="{{ URL::route('users-delete', $user->id) }}" style="text-decoration: none; color: white"><small class="btn btn-danger">Delete</small></a>
			</div>
		</div>
@endforeach
</div>
@stop


		