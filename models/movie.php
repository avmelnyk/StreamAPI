<?php

class Movie {
	
	var $id;
	var $name;
	var $rate;
	var $length;
	var $start;
	var $end;
	
	function __construct ($id, $name,$rate, $length, $start, $end) {
		$this->id = $id;
		$this->name = $name;
		$this->rate = $rate;
		$this->length = $length;
		$this->start = $start;
		$this->end = $end;
	}
	
	function __toString () {
		return $this->id . $this->name . $this->rate . $this->length . $this->start . $this->end;
	}
}
