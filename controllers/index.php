<?php

include("template.php");


class IndexController {
	
	function get () {
		$template = new Template("tmpl/");
		$template->display("index");
	}
	
	function create () {
		return "post method";
	}
	
}
