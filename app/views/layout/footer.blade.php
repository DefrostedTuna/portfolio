<div class="padding-vertical col-md-12 center-text">

	
	<div class="row">
		<div class="col-md-4 col-sm-4 col-sm-offset-1">
			<h3 class="margin-none">Contact</h3>
			<ul class="padding-all">
				@if(Homepage::find(1)->phone)
				<li>Phone: <br> {{ Homepage::find(1)->phone }}</li>
				@endif
				<li>Email: <br> {{ Homepage::find(1)->email }}</li>
			</ul>
		</div>

		<div class="col-md-4 col-sm-3 col-sm-offset-2 col-xs-4 col-xs-offset-4">
			<a href="http://www.laravel.com/" target="_blank"><img class="plain-img" src="{{ URL::asset('assets/img/laravel-footer.png') }}"></a>
			<br><br>
			<a href="https://www.digitalocean.com/" target="_blank"><img class="plain-img" src="{{ URL::asset('assets/img/digitalocean.png') }}"></a>
		</div>
	</div>
	<div class="row">
		<p>&copy Rick Bennett <?php echo date('Y'); ?></p>
	</div>

</div>
