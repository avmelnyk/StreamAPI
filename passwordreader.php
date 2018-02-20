<?php

class PasswordReader {
	
	function readPassword ($location) {
		$file_content = file_get_contents($location);
		$password_json = json_decode($file_content, true); 
		$password = $password_json["password"];
		return $password;
	}
}
