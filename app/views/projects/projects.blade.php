@extends('layout.main')

@section('title')
	Projects
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Projects</h1>
		<hr>
		<p>A quick look at what I've done</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="container-fluid padding-none">

	@foreach($projects as $project)
	<div class="content bg" style="margin-bottom: 20px;">

		<div class="center-text">
			<h3><a class="plain-link-black" href="{{ URL::route('projects-slug', $project->slug) }}">{{ $project->name }}</a></h3>
		</div>
		<hr style="width: 45%">
		<div class="padding-vertical center">
			<!--{{ preg_replace('/\s+?(\S+)?$/', '', substr($project->description, 0, 4000)) }}-->
			<!--@if(strlen($project->description) > 3000)
				<small>...</small>
			@endif-->
			@if($project->images)
				<a href="{{ URL::route('projects-slug', $project->slug) }}"><img src="{{ asset($project->images) }}" style="max-width: 80%"></a>
				@else
				<p>{{ $project->description }}</p>
			@endif
		</div>
		<hr style="width: 85%">
		<div class="right-text">
			<!--Use this code to extract date_format from an aray rather than an object-->
			{{ date_format(new DateTime($project->created_at), 'm-d-Y') }}
		</div>
			
	</div>
	@endforeach
</div>
@stop