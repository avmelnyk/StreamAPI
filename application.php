<?php

include("router.php");
include("passwordreader.php");
include("pdo/programelementpdo.php");
include("pdo/moviepdo.php");
include("programscheduler.php");

class Application {
	var $router;
	var $program_element_pdo;
	var $movie_pdo;
	var $scheduler;

	function __construct () {
		$this->router = new Router();
		spl_autoload_register(function ($className) {
			$classPath = strtolower($className);
			if (substr($classPath, -10) === "controller") {
				include("controllers/" . substr($classPath, 0, -10) . ".php");
			}
			else {
				header("HTTP/1.1 404 Not Found"); 
			}
		});
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPassword("password.json");
		$dbname = "streaming";
		$table_name = "program";
		$this->program_element_pdo = new ProgramElementPDO($username, $password, $dbname, $table_name);
		$this->movie_pdo = new MoviePDO($username, $password, $dbname, "movies");
		$this->scheduler = new ProgramScheduler($this->program_element_pdo, $this->movie_pdo);
	}

	function run () {
		$this->router->dispatch($_SERVER["PATH_INFO"]);
		$this->scheduler->scheduleProgaram();
		
	}
}
