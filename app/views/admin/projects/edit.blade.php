@extends('layout.main')

@section('title')
	Edit - {{ $project->name }}
@stop

@section('page-header')
	<div class="headWrap">
		<h1>{{ $project->name }}</h1>
		<hr>
		<p>Edit project</p>
	</div><!--headWrap-->
@stop

@section('content') 
<div class="container-fluid col-md-12">
	<div class="content bg" style="">
			@if($errors->has())
				<div class="errors center-text">
					Please correct errors to continue
				</div>
				<hr>
			@endif
	<form action="{{ URL::route('projects-update', $projectId = $project->id) }}" method="post" enctype="multipart/form-data">

			<div class="pull-right padding-bottom"><!--Right float container for type and feature-->
				<div class="padding-bottom"> <!--type-->
					<label>Visible to public</label>
					<select name="show" id="show" value="">
						<option value="1" {{{ $project->show == 1 ? "selected='selected'" : '' }}} >Yes</option>
						<option value="0" {{{ $project->show == 0 ? "selected='selected'" : '' }}} >No</option>
					</select>
				</div>

				<div class="padding-bottom"><!--featured-->
					<label>Featured</label>
					<select name="featured" id="featured" value="">
						<option value="1" {{{ $project->featured == 1 ? "selected='selected'" : '' }}} >Yes &nbsp&nbsp</option>
	 					<option value="0" {{{ $project->featured == 0 ? "selected='selected'" : '' }}} >No &nbsp&nbsp</option>
					</select>
				</div>
				<div class="padding-bottom">
					<label for="image">Filename:</label>
					<input type="file" name="image" id="image" style="background: white; padding: 7px;"><br>
				</div>
			</div>

			<div class="pull-left padding-bottom">
				<div class="padding-bottom"><!--name-->
					<label style="text-align: left;">Name:</label>
					<input type="text" name="name" id="name" value="{{ $project->name }}">
					<div class="errors il">	
						@if($errors->has('name'))
							{{ $errors->first('name') }}
						@endif
					</div>
				</div>

				<div class="padding-bottom"><!--link-->
					<label style="text-align: left;">Link:</label>
					<input type="text" name="link" id="link" value="{{ $project->link }}">
					<div class="errors il">
						@if($errors->has('link'))
							{{ $errors->first('link') }}
						@endif
					</div>
				</div>
			</div>

			<div class="center-text clear">
				<div class=""><!--body-->
					<label style="">Body:</label>
					<div class="errors">
						@if($errors->has('body'))
							{{ $errors->first('body') }}
						@endif
					</div>
					<textarea name="body" id="body" value="" style="width: 100%; min-width: 100%; max-width: 100%">
						{{ $project->description }}
					</textarea>			
				</div>
			</div>
		
		<hr style="border-top: 1px solid black">

		<div class="center-text">
			<input type="submit" value="Submit" class="btn btn-primary" style="width: 20%; min-width:100px;">
			{{ Form::token() }}
		</div>
	</form>
</div>
</div>
@stop