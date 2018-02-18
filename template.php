<?php

class Template {

	 var $dir_tmpl;
	 var $data = array();
	
	public function __construct ($dir_tmpl) {
		$this-> dir_tmpl = $dir_tmpl;
	}
	
	function set ($name, $value) {
		$this->data[$name] = $value;
	}
	
	function delete ($name) {
		unset($this-> data[$name]);
	}
	
	function __get ($name) {
		if(isset($this->data[$name])) {
			return $this->data[$name];
		}
	}
	
	function display ($template) {
		ob_start();
		include($this->dir_tmpl . $template . ".tpl");
		echo ob_get_clean();
	}
	
}
