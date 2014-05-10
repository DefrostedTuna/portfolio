@extends('layout.main')

@section('title')
	View User - {{ $user->username }}
@stop

@section('page-header')
	<div class="headWrap center">
		<h1>{{ $user->username }}</h1>
	</div>
@stop

@section('content')
<div class="content col-md-8 col-xs-12 col-md-offset-2 bg">

	<div class="col-md-4 col-sm-6 col-xs-12 left-text">
		<h3>Full name</h3>
		<p>{{ $user->first_name }} {{ $user->last_name }}</p>
	
		<h3>Bio</h3>
		<p>{{ $user->bio }}</p>
	</div>
	
	<div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-4">
		<h3>Username</h3>
		<p>{{ $user->username }}</p>
		<h3>Email</h3>
		<p>{{ $user->email }}</p>
	</div>
	
	
	

</div>
@stop