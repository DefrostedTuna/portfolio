<?php

class Homepage extends Eloquent {
	
	protected $table = "homepage";

	protected $fillable = array("about", "headline", "first_name", "last_name", "email", "phone", "location", "image",);

}