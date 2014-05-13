@extends('layout.main')

@section('title')
	Rick Bennett Coding - About
@stop

@section('page-header')
	<div class="headWrap">
		<h1>More about myself</h1>
		<hr>
		<p>What makes a {{ $homepage->first_name}} {{ $homepage->last_name }}?</p>
	</div><!--headWrap-->
@stop

@section('content')
<div id="about" class="content col-md-10 col-md-offset-1 bg">
	<div class="row col-md-10 col-md-offset-1 content">
		<h3 class="center-text">A bit about me</h3>
		<hr style="width: 40%">

		<div class="col-lg-3 col-sm-5 hidden-xs">
			<img src="{{ asset('assets/img/about-me.jpg') }}">
		</div>
		<div class="col-lg-9 col-sm-7 col-xs-12">
			<p> 
				Originally born in Maine, my family moved to Florida when I was around 5 years old. 
				My younger childhood days were spent moving around the Tampa and St. Petersburg area, 
				eventually moving to Kentucky shortly before entering high school. 
				Upon graduating high school I tried my hand at various things I had a natural ability with 
				such as networking and electrical work but I found shortly after that I didnt ENJOY doing 
				these kinds of things on a regular basis. I eventually stumbled upon programming while trying 
				to pick up a new hobby and have since loved it so much that I decided to turn that passion into a career.
			</p>
			<p>
				I'm like most average tech nerds I imagine. My spare time involves playing video games, 
				taking things apart just because I can and spending long hours in front of the computer learning new stuff. 
				Of course I enjoy other things as well, I play guitar on occasion (a bit less in recent months) and enjoy 
				the outdoors, I'm not a complete shut in as I'm sure most of my family and friends think I am. 
				All around I'm a friendly, laid back guy.
			</p>
		</div>
	</div>
	
	<div class="spacer"></div>

	<div class="row col-md-10 col-md-offset-1 content">
		<h3 class="center-text">Why PHP?</h3>
		<hr style="width: 40%">
		<div class="col-md-12">
			<p>
				There's a bit of an odd story behind this to be honest. I'm a big video game nerd, no secret there. 
				When I was fresh into high school I stumbled across a program called RPG Maker. As probably already assumed, 
				this was a program that allowed a very user friendly interface for programming games. 
				Although I did not realize it at the time, I was actually building a subconscious understanding of 
				basic programming concepts. This opened a door in my mind and allowed me to start making complex connections 
				and think abstractly in terms of what I was capable of doing.
			</p>
			<p>
				So how does this tie in with PHP?
			</p>
			<p>
				While working with this program, I spent most of my time writing out various bits of code to make things work behind the scenes. 
				Building things such as scripted events, working with variables - both on a local and global scope, 
				developing custom menu systems from scratch to include options, item management and the like.
			</p>
			<p>
				When I first decided to learn programming, I scoured the internet to research the different languages and 
				eventually ran head first into PHP. Programming in PHP just felt natural compared to other languages. 
				I was having FUN doing it, I was reminded of my time in school programming small games for fun to show off to friends. 
				Once I got down the basics of scripted PHP I ventured off into the world of Object Oriented Programming (OOP), MVC structure and Frameworks.
			</p>
			<p>
				At last, here I am today diving straight into an exciting career, honing my skills to become an even better developer every day.
			</p>
		</div>
	</div>

	<div class="spacer"></div>

	<div class="row col-md-10 col-md-offset-1 content">
		<h3 class="center-text">What to expect from me</h3>
		<hr style="width: 40%">
		<div class="col-md-12">
			<p>
				I'm a pretty laid back guy, but when it comes down to business I know when to step up to get things done, 
				and thats exactly what I'll do. I am a very organized individual, I play nice with others and I constantly 
				look for ways to improve on every aspect of the things I do. Dedication and efficiency go hand in hand for me, 
				if something needs to be done it'll get done no matter what. You can bet that I'll be the guy figuring out 
				how to do it better and faster along the way as well. If there is something that I don't know how to do, 
				I make it a point to figure it out. When I set a goal I don't give up, it gets done, period.
			</p>
			<p>
				With me you get the whole package.
			</p>
		</div>
	</div>

	<div class="spacer"></div>

	<div class="row col-md-10 col-md-offset-1 content">
		<h3 class="center-text">What I enjoy working on</h3>
		<hr style="width: 40%">
		<div class="col-md-12">
			<p>
				Currently I'm enjoying working with CMS-type projects as I very much enjoy the idea of being able to 
				customize everything from a user-end perspective. This is what most of my personal projects will be 
				for the time being.
			</p>
		</div>
	</div>
</div>
		
@stop