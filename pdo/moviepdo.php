<?php


class MoviePDO{
	var $username;
	var $password;
	var $dbname;
	var $table_name;
	
	function __construct ($username, $password,  $dbname, $table_name) {
		$this-> username = $username;
		$this-> password = $password;
		$this-> dbname = $dbname;
		$this-> table_name = $table_name;
	}
	
	function showTable () {
		try {
			$dbh = new PDO('pgsql:host=localhost; dbname=' . $this->dbname, $this->username, $this->password);
			foreach($dbh->query('SELECT * from ' . $this->table_name) as $row) {
				print_r($row);
			}
			$dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function addMovie (Movie $movie){
		
	}
	
	function get (){
	
	}
	
}
