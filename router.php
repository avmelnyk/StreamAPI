<?php


class Router {
	
	static $statusMessage = [
		204 => "204 No Content",
		404 => "404 Not Found",
	];

	function dispatch ($url) {
		$pathMap = explode("/", substr($url, 1));
		$urlParams = array_slice($pathMap, 1);
		$routeRoot = explode(".", $pathMap[0]);
		if (strlen($routeRoot[0]) === 0){
			$routeRoot[0] = "index";
		}
		$className = ucfirst($routeRoot[0]) . "Controller";
		
		if(class_exists($className)){
			$classInstance = new $className();
			switch($_SERVER["REQUEST_METHOD"]){
				case "GET":
					$result = $classInstance->get($urlParams);
					if(gettype($result) === "string"){
						echo $result;
					}
					else if (gettype($result) === "integer" && $result >= 100 && $result < 600) { 
						header("HTTP/1.1 " . self::$statusMessage[$result]);
					}
					else if (gettype($result) === "array" || gettype($result) === "object" ) {
						header('Content-Type: application/json');
						echo json_encode($result);
					}
					break;

				case "POST":
					echo $classInstance->create();
					break;
			}
		}
		else {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");	
		}
	}

}
