<?php

include("models/programelement.php");

class ProgramElementPDO{
	
	var $pdo;
	var $username;
	var $password;
	var $dbname;
	var $table_name;
	
	function __construct ($username, $password,  $dbname, $table_name) {
		$this-> table_name = $table_name;
		$this->pdo = new PDO('pgsql:host=localhost; dbname=' . $dbname, $username, $password);
	}
	
	function getAllProgramElements () {
		try {
			$sth = $this->pdo->prepare("SELECT * FROM PROGRAM" );
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "programelement");
			return $result;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function addProgramElement (ProgramElement $element) {
		try {
			$stmt = $this->pdo->prepare("INSERT INTO Program( movie_id, movie_start) VALUES(:movie_id, :movie_start);");
			$stmt->bindParam(':movie_id', $element->movie_id);
			$stmt->bindParam(':movie_start', $element->movie_start);
			$stmt->execute();
		}catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function getCurrentProgramElement () {
		try {
			$stmt = $this->pdo->prepare("SELECT * FROM PROGRAM WHERE (movie_start < :current_time) ORDER BY movie_start DESC LIMIT 1;");
			$stmt->bindParam(':current_time', time());
			$stmt->execute();
			return $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "programelement");
		}catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function getFutureProgramElements () {
		try{
			$stmt = $this->pdo->prepare("SELECT * FROM PROGRAM WHERE (movie_start > :current_time) LIMIT 100;" );
			$stmt->bindParam(':current_time', time());
			$stmt->execute();
			return $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "programelement");
		} catch(PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function deleteOldProgramElements () {
		
	}
	
}
