@extends('layout.main')

@section('title')
Home
@stop

@section('page-header')
	<div class="headWrap">
		<h1>{{ $homepage->first_name }} {{ $homepage->last_name }}</h1>
		<hr>
		<p>{{ $homepage->headline }}</p>
	</div><!--headWrap-->
@stop

@section('content')
<div class="row">
	<div class="content bg col-md-8" style="overflow: auto">
			<!--@if(Auth::check())
				<p>Hello, {{ Auth::user()->username }}.</p>
			@else
				<p>You are not signed in.</p>
			@endif-->
			{{ $homepage->about }}

	</div>
	<div class="content bg col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
		<h3 class="center-text" style="text-decoration: underline;">{{ $homepage->first_name }} {{ $homepage->last_name }}</h3>
		<ul id="contactInfo" class="center-text il" style="list-style: none;">
			<li>Email<br> {{ $homepage->email }}</li>
			
			@if($homepage->phone)
				<li>Phone<br>{{ $homepage->phone }}</li>
			@endif
			<li>Location<br>{{ $homepage->location }}</li>
		</ul>
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