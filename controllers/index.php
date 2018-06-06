<?php

include("template.php");
ini_set('display_errors', 0);


class IndexController {
	
	function get () {
		$template = new Template("tmpl/");
		$template->display("index");
	}
	
	function create () {
		return "post method";
	}
	
}
