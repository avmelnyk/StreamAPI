<?php


include("models/stream.php");
include("template.php");
ini_set('display_errors', 0);

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
		$movie = new Movie($_POST["id"],$_POST["name"], $_POST["rate"], $_POST["length"]);
		$this->movie_pdo->addMovie($movie);
		$all_movies = $this->movie_pdo->getAllMovies();
		$template = new Template("tmpl/");
		$template->set("all_movies", $all_movies);
		$template->display("movies");
	}
}
