<?php

include("router.php");

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
	}

	function run () {
		$this->router->dispatch($_SERVER["PATH_INFO"]);
	}
}
