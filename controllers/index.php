<?php

include("template.php");
include("pdo/moviepdo.php");
include("models/stream.php");
include("passwordreader.php");

class IndexController {
	
	function get () {
		$template = new Template("tmpl/");
		$template->display("index");
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPassword("password.json");
		$dbname = "streaming";
		$table_name = "movies";
		$movie_pdo = new MoviePDO($username, $password, $dbname, $table_name);
		$movie_pdo->showTable();
	}
	
	function create () {
		return "post method";
	}
	
}
