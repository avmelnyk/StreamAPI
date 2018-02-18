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
				return $template->display("menu");
	}
	
	function create () {
		return "post method";
	}
}
