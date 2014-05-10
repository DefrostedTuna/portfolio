@extends('layout.main')

@section('title')
	{{ $project->name }}
@stop

@section('page-header')
	<div class="headWrap center-text">
		<h1>{{ $project->name }}</h1>
	</div><!--headWrap-->
@stop

@section('content')
<div class="row">
	@if(Auth::check())
		
			<h3 class="pull-left il-block"><a class="plain-link-black" href="{{ URL::route('projects-edit-single', $project->id) }}">Edit this project</a></h3>
	@endif
	@if($project->link)

			<h3 class="pull-right il-block"><a class="plain-link-black" href="{{ $project->link }}" target="_blank">Visit the page!</a></h3>
	@endif
</div>
<div class="container-fluid">

	<div class="row content bg" style="margin-bottom: 20px;">

		<div class="padding-vertical">
			{{ $project->description }}
		</div>
		<hr style="border-top: 1px solid black">
		<div class="right-text">
			{{ date_format(new DateTime($project->created_at), 'm-d-Y') }}
		</div>
			
	</div>
</div>
@stop