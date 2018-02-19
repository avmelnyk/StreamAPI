<?php

class Stream {
	
	var $time;
	var $url;
	
	function __construct ($time, $url) {
		$this->time = $time;
		$this->url = $url;
	}
	function __toString () { 
		return "time: " . $this-> time .  ", url: " . $this->url;
	}
}
