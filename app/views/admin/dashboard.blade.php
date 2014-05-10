@extends('layout.main')

@section('title')
	Admin Dashboard
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Welcome, {{ Auth::user()->username }}</h1>
		<hr>
		<p>What would you like to do?</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="container center bg">

<div class="container-fluid row center-text padding-all">

	<div class="col-md-4 padding-all">
		<a href="{{ URL::route('homepage-edit') }}"  style="color: black; text-decoration: none;">
		<img class="plain-img" src="assets/img/home.png" />
		<br><br>
		<h3>Edit Homepage</h3>
		</a>
	</div>

	<div class="col-md-4 padding-all">
		<a href="{{ URL::route('projects-edit') }}" style="color: black; text-decoration: none;">
		<img class="plain-img" src="assets/img/portfolio.png" />
		<br><br>
		<h3>Edit Projects</h3>
		</a>
		<a class="btn btn-primary" href="{{ URL::route('projects-create') }}">New Project!</a>
	</div>

	<div class="col-md-4 padding-all">
		<a href="{{ URL::route('users-edit') }}"  style="color: black; text-decoration: none;">
		<img class="plain-img" src="assets/img/user.png" />
		<br><br>
		<h3>Edit Users</h3>
		</a>
		<a class="btn btn-primary" href="{{ URL::route('account-create') }}">New User!</a>
	</div>


</div>
</div>
@stop