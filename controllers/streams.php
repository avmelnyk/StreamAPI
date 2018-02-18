<?php

include("models/stream.php");

class StreamsController {
	
	function get ($urlParams) {
		$stream = new Stream(6996, "/film5.mp4");
		return $stream;
	}
	
}
