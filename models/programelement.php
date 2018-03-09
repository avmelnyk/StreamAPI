<?php

 class ProgramElement {
	 
	var $movie_id;
	var $movie_start;
		
	function __construct ($movie_id, $movie_start, $movie_end) {
		$this->movie_id = $movie_id;
		$this->movie_start = $movie_start;
	}

}
