<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
    	@yield('title')
    </title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    <!-- Bootstrap theme -->
    {{ HTML::style('assets/css/bootstrap-theme.min.css') }}
   	<!-- Custom styles -->
   	{{ HTML::style('assets/css/common.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{ HTML::script('assets/js/tinymce/tinymce.min.js') }}
	<script type="text/javascript">
	tinymce.init({
	    selector: "textarea",
	    plugins: [ 	"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	    	      	"searchreplace wordcount visualblocks visualchars code fullscreen",
			  		"insertdatetime media nonbreaking save table contextmenu directionality",
			       	"emoticons template paste textcolor jbimages"
		],

	    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    	toolbar2: "print preview media | forecolor backcolor emoticons",
    	extended_valid_elements : "iframe[src|frameborder|style|scrolling|class|width|height|name|align]",

    	relative_urls : false,


	 });
	</script>

	</head>
	<body>

		<div class="navigation-bar">
			@if(Auth::check())
				@include('admin.layout.adminNavigation')
			@else
				@include('layout.navigation')
			@endif

		</div>
		<div class="header">
			@yield('page-header')
		</div>
		<br>
		<hr style="width: 95%">
		<br>
		<div class="container-fluid padding-none" style="max-width: 95%;"><!--Main content container-->
			<!--This is for any global messages that might be passed through to the user-->
			<div class="container center-text"><!--Global alert container-->
				@if(Session::has('global'))
					<div class="global col-md-6 col-md-offset-3 alert alert-{{{ (Session::has('alert')) ? Session::get('alert') : 'info' }}}" id="alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<p>{{ Session::get('global') }}</p>
					</div>
				@endif
			</div><!--end row/container-->
		
			<div class="">
				<!--Main content that is to take up the entire page-->
				<div class="center container">
					@yield('content')
				</div>

				<!--Main content that is to be split to the left-->
				<div class="col-med-9">
					@yield('content-left')
				</div>
				
				<!--Side content that is to be floated to the right in a smaller box-->
				<div class="col-md-3 col-med-offset-9">
					@yield('content-right')
				</div>
				<div class="row">&nbsp</div>


			</div><!--end row-->
		</div><!--end container-->
		<div id="footer">
			@include('layout.footer')
	    </div>
		


	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    {{ HTML::script("assets/jquery/1.11.0/jquery.min.js") }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/docs.min.js') }}
    
	</body>
</html>