@extends('layout.main')

@section('title')
	Manage Projects
@stop

@section('page-header')
<div class="headWrap center-text">
	<h1>Manage Projects</h1>
</div>
@stop



@section('content')
<div class="content bg ">
@foreach($projects as $project)
		<div id="{{ $project->slug }}" class="row col-md-12 center no-float" style="margin-bottom: 10px">
			<div class="row">
				<small class="il">({{ date_format($project->created_at, 'm-d-Y') }})</small>
			</div>

			<div class="row" style="">
				<h3 class="il-block" style="margin-bottom: 5px"><a class="plain-link-black" href="{{ URL::route('projects-slug', $project->slug) }}">{{ $project->name }}</a></h3>
			</div>

			<hr style="width: 35%">

			<div class="row">
				<div class="col-md-6">
					@if($project->images)
						<a class="plain-link-black" href="{{ URL::route('projects-slug', $project->slug) }}"><img src="{{ asset($project->images)}}"></a>
					@else
						<a class="plain-link-black" href="{{ URL::route('projects-slug', $project->slug) }}"><img src="{{ asset('assets/img/blank.png')}}"></a>
					@endif
				</div>

				<div class="col-md-6 padding-all">
					<a href="{{ URL::route('projects-edit-single', $project->id) }}" style="text-decoration: none; color: white"><small class="row margin-all btn btn-primary" style="width: 50%">Edit</small></a>
					<a href="{{ URL::route('projects-delete', $project->id) }}" style="text-decoration: none; color: white"><small class="row margin-all btn btn-danger" style="width: 50%">Delete</small></a>
					
					<div class="spacer"></div>
					
					<hr style="width: 50%">
					
					<form action="{{ URL::route('projects-quick-update') }}" method="post">
						
						<div class="padding-all il-block">
						
							<div class="row padding-all block">
								<input 
									class="btn"
									type="checkbox" 
									id="featured_{{$project->id}}" 
									name="featured" 
									{{ $project->featured == 1 ? 'checked' : '' }}
									style="width: 20px; height: 20px"
									onClick="this.form.submit()"
								/>
								&nbsp&nbsp
								<label for="featured_{{$project->id}}" class="il-block btn btn-primary" style="width: 100px">Featured</label>
							</div>

							<div class="row padding-all block">
								<input 
									class="btn"
									type="checkbox" 
									id="show_{{$project->id}}" 
									name="show" 
									{{ $project->show == 1 ? 'checked' : '' }}
									style="width: 20px; height: 20px"
									onClick="this.form.submit()"
								/>
								&nbsp&nbsp
								<label for="show_{{$project->id}}" class="il-block btn btn-primary" style="width: 100px">Show</label>
							</div>
						</div>

						<div class="spacer"></div>
				
						<div class="row">
							{{ Form::token() }}
							<input type="hidden" name="id" value="{{ $project->id }}" /> 
							<noscript>
								<input class="btn btn-primary" style="width: 150px" type="submit" value="Submit">
							</noscript>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr style="width: 85%">
@endforeach
</div>
@stop