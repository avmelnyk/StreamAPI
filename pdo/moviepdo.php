<?php

class MoviePDO{
	
	function __construct () {
		
	}
	
	function showTable () {
		$user = "streaming";
		$password = "nyCjjHUUDO";
		$dbname = "streaming";
		$table_name = "movies";
		try {
			$dbh = new PDO('pgsql:host=localhost; dbname=' . $dbname, $user, $password);
			foreach($dbh->query('SELECT * from ' . $table_name) as $row) {
				print_r($row);
			}
			$dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
}
