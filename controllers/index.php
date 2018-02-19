<?php

include("template.php");

class IndexController {
	
	function get() {
		$template = new Template("tmpl/");
		$menu = array();
		$menu["http://site.ru"] = "Главная";
		$menu["http://site.ru/page-1.html"] = "Страница 1";
		$menu["http://site.ru/page-2.html"] = "Страница 2";
		$template->set("menu", $menu);
		$template->display("menu");
		
		$user = "streaming";
		$password = "nyCjjHUUDO";
		
		try {
			$dbh = new PDO('pgsql:host=localhost; dbname=streaming', $user, $password);
			foreach($dbh->query('SELECT * from movies') as $row) {
				print_r($row);
			}
			$dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function create () {
		return "post method";
	}
}
