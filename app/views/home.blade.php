@extends('layout.main')

@section('title')
Home
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Rick <span style="font-weight: bold">Bennett</span></h1>
		<hr>
		<p style="font-style: italic">{{ $homepage->headline }}</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="row">
	<div class="content bg col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1" style="overflow: auto">
			<!--@if(Auth::check())
				<p>Hello, {{ Auth::user()->username }}.</p>
			@else
				<p>You are not signed in.</p>
			@endif-->
			@if($homepage->image)
				<div class="col-lg-2 col-md-4 col-sm-4 col-sm-offset-0 padding-all hidden-xs">
					<img src="{{ asset($homepage->image) }}">
				</div>
			@endif
			<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
			{{ $homepage->about }}
			</div>
	</div>
</div>
<div class="content margin-bottom"></div>
<div class="content bg row">
	<h1 class="center-text"><a href="{{ URL::route('projects') }}" class="plain-link-black">Some of my work</a></h1>
	@foreach(array_chunk($projects, 2) as $row)
	<div class="row">
		@foreach($row as $project)
			<div class="content col-md-6" style="margin-bottom: 20px;">

				<div class="">
					<h3 class="center-text"><a class="plain-link-black" href="{{ URL::route('projects-slug', $project->slug) }}">{{ $project->name }}</a></h3>
				</div>

				@if($project->images)
					<a href="{{ URL::route('projects-slug', $project->slug) }}"><img src="{{ asset($project->images) }}"></a>
					@else
					<p>{{ $project->description }}</p>
				@endif
				<hr>
				<div class="right-text">
					{{ date_format(new DateTime($project->created_at), 'm-d-Y') }}
				</div>
					
			</div>
		@endforeach
	</div>
	
	<hr style="border-top: 1px solid black">
	@endforeach
</div>
@stop