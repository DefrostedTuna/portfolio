@extends('layout.main')

@section('title')
	{{ $homepage->first_name}} {{ $homepage->last_name }} - About
@stop

@section('page-header')
	<div class="headWrap">
		<h1>More about myself</h1>
		<hr>
		<p>What makes a {{ $homepage->first_name}} {{ $homepage->last_name }}?</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="content col-md-12 bg">
	<p>About!</p>
</div>
		
@stop