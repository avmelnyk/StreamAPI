<?php

include("stream.php");

class StreamsController {
	
	function get ($urlParams) {
		$stream = new Stream(6966, "/film5.mkv");
		return $stream;
	}
	
}
