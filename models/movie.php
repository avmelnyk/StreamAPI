<?php

class Movie {
	
	var $id;
	var $name;
	var $rate;
	var $length;
	var $url;
	
	function __construct ($id, $name, $rate, $length, $url) {
		$this->id = $id;
		$this->name = $name;
		$this->rate = $rate;
		$this->length = $length;
		$this->url = $url;
	}
	
	function __toString () {
		return "Id:" . $this->id . " Name: " . $this->name . " Rate: " . $this->rate . " Length: " .  $this->length . $this->url .  '<br/>';
	}
}
