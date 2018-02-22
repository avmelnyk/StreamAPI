<?php

include("models/stream.php");

class StreamsController {
	
	function get ($urlParams) {
		$stream = new Stream(1, "/film1.mp4");
		return $stream;
	}
	
}
