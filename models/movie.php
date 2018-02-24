<?php

class Movie {
	
	var $id;
	var $name;
	var $rate;
	var $length;
	var $film_start;
	var $film_end;
	
	function __construct ($id, $name,$rate, $length, $film_start, $film_end) {
		$this->id = $id;
		$this->name = $name;
		$this->rate = $rate;
		$this->length = $length;
		$this->film_start = $film_start;
		$this->film_end = $film_end;
	}
	
	function __toString () {
		return "Id:" . $this->id . " Name: " . $this->name . " Rate: " . $this->rate . " Length: " .  $this->length . " Start: " .$this->film_start ." End: " . $this->film_end . '<br/>';
	}
}
