<div class="container col-md-12 padding-top center-text">
	<br>
	<div class="row">
		<p>&copy Rick Bennett <?php echo date('Y'); ?></p>
	</div>
	
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<h3 class="margin-none">Contact</h3>
			<ul>
				@if(Homepage::find(1)->phone)
				<li>Phone: <br> {{ Homepage::find(1)->phone }}</li>
				@endif
				<li>Email: <br> {{ Homepage::find(1)->email }}</li>
			</ul>
		</div>

		<div class="col-md-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
			<a href="http://www.laravel.com/" target="_blank"><img class="plain-img" src="{{ URL::asset('assets/img/laravel-footer.png') }}"></a>
			<br><br>
			<a href="https://www.digitalocean.com/" target="_blank"><img class="plain-img" src="{{ URL::asset('assets/img/digitalocean.png') }}"></a>
		</div>
	</div>
	<br>

</div>
