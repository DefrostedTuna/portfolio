@extends('layout.main')

@section('title')
	Create Project
@stop

@section('page-header')
	<div class="headWrap">
		<h1>Create content</h1>
		<hr>
		<p>Create a new page in the projects section</p>
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
	<form action="{{ URL::route('projects-create') }}" method="post" enctype="multipart/form-data">

			<div class="pull-right padding-bottom"><!--Right float container for type and feature-->
				<div class="padding-bottom"> <!--type-->
					<label>Visible to public</label>
					<select name="show" id="show" value="">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>

				<div class="padding-bottom"><!--featured-->
					<label>Featured</label>
					<select name="featured" id="featured" value="">
						<option value="1">Yes &nbsp&nbsp</option>
	 					<option value="0">No &nbsp&nbsp</option>
					</select>
				</div>

				<div class="padding-bottom">
					<label for="image">Cover Image:</label>
					<input type="file" name="image" id="image" style="background: white; padding: 7px;"><br>
					@if($errors->has('image'))
						<div class="errors">
							{{ $errors->first('image') }}
						</div>
					@endif
				</div>	
				
				
			</div>

			<div class="pull-left padding-bottom">
				<div class="padding-bottom"><!--name-->
					<label style="text-align: left;">Name:</label>
					<input type="text" name="name" id="name" value="{{ (Input::old('name')) ? e(Input::old('name')) : '' }}">
					<div class="errors il">	
						@if($errors->has('name'))
							{{ $errors->first('name') }}
						@endif
					</div>
				</div>

				<div class="padding-bottom"><!--link-->
					<label style="text-align: left;">Link:</label>
					<input type="text" name="link" id="link" value="{{ (Input::old('link')) ? e(Input::old('link')) : '' }}">
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
					<textarea name="body" id="body" style="width: 100%; min-width: 100%; max-width: 100%">
						{{ (Input::old('body')) ? e(Input::old('body')) : '' }}
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