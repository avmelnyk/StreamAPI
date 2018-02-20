<?php

include("template.php");
include("pdo/moviepdo.php");
include("models/stream.php");
include("models/movie.php");
include("passwordreader.php");

class IndexController {
	
	function get () {
		$template = new Template("tmpl/");
		$menu = array();
		$menu["http://site.ru"] = "Главная";
		$menu["http://site.ru/page-1.html"] = "Страница 1";
		$menu["http://site.ru/page-2.html"] = "Страница 2";
		$template->set("menu", $menu);
		$template->display("menu");
		$password_reader = new PasswordReader();
		$username = "streaming";
		$password = $password_reader->readPaswword("password.json");
		$dbname = "streaming";
		$table_name = "movies";
		$movie_pdo = new MoviePDO($username, $password, $dbname, $table_name);
		$movie_pdo->showTable();
	}
	
	function create () {
		return "post method";
	}
	
}
