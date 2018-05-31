<?php

class Movie {
	
	var $id;
	var $name;
	var $rate;
	var $length;
	
	function __construct ($id, $name, $rate, $length) {
		$this->id = $id;
		$this->name = $name;
		$this->rate = $rate;
		$this->length = $length;
	}
	
	function __toString () {
		return "Id:" . $this->id . " Name: " . $this->name . " Rate: " . $this->rate . " Length: " .  $this->length . '<br/>';
	}
}
