<?php

include("models/stream.php");
include("pdo/programelementpdo.php");
include("pdo/moviepdo.php");
include("passwordreader.php");
include("programscheduler.php");

class StreamsController {
	
	var $program_element_pdo;
	var $movie_pdo;
	var $scheduler;
	
	function __construct(){
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPassword("password.json");
		$dbname = "streaming";
		$table_name = "program";
		$this->program_element_pdo = new ProgramElementPDO($username, $password, $dbname, $table_name);
		$this->movie_pdo = new MoviePDO($username, $password, $dbname, "movies");
		$this->scheduler = new ProgramScheduler($this->program_element_pdo, $this->movie_pdo);
	}
	
	function get ($urlParams) {
			$this->scheduler->scheduleProgaram();
			$current_element = $this->program_element_pdo->getCurrentProgramElement()[0];
			$current_movie =  $this->movie_pdo->getMovieById($current_element->movie_id)[0];
			echo $current_movie;
			return  new Stream(time()-$current_element->movie_start,  $current_element->movie_id);
	}
	
}
