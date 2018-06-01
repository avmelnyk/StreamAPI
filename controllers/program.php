<?php

include("programscheduler.php");
include("passwordreader.php");
include("template.php");


class ProgramController {
	
	var $program_element_pdo;
	var $movie_pdo;
	
	function __construct () {
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPassword("password.json");
		$dbname = "streaming";
		$this->program_element_pdo = new ProgramElementPDO($username, $password, $dbname, "program");
		$this->movie_pdo = new MoviePDO($username, $password, $dbname, "movies");
	}
	
	function get () {
		$elements = $this->program_element_pdo->getFutureProgramElements();
		$template = new Template("tmpl/");
		$template->set("elements", $elements);
		$template->display("program");
	}
	
}
