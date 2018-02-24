<?php

include("pdo/moviepdo.php");
include("models/stream.php");
include("passwordreader.php");
include("template.php");

class MoviesController{
	
	var $moviepdo;
	
	function __construct () {
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPassword("password.json");
		$dbname = "streaming";
		$table_name = "movies";
		$this->movie_pdo = new MoviePDO($username, $password, $dbname, $table_name);
	}
	
	function get () {
		$all_movies = $this->movie_pdo->getAllMovies();
		$template = new Template("tmpl/");
		$template->set("all_movies", $all_movies);
		$template->display("movies");
	}
	
	function create () {
		$movie = new Movie($_POST["id"],$_POST["name"], $_POST["rate"], $_POST["length"],$_POST["film_start"],$_POST["film_end"]);
		$this->movie_pdo->addMovie($movie);
		$all_movies = $this->movie_pdo->getAllMovies();
		$template = new Template("tmpl/");
		$template->set("all_movies", $all_movies);
		$template->display("movies");
	}
}
