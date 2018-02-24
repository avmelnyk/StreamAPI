<?php

include("models/movie.php");

class MoviePDO{
	
	var $pdo;
	var $username;
	var $password;
	var $dbname;
	var $table_name;
	
	function __construct ($username, $password,  $dbname, $table_name) {
		$this-> table_name = $table_name;
		$this->pdo = new PDO('pgsql:host=localhost; dbname=' . $dbname, $username, $password);
	}
	
	function getAllMovies () {
		try {
			$sth = $this->pdo->prepare("SELECT * FROM MOVIES" );
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "movie");
			return $result;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function addMovie (Movie $movie) {
		try {
			$stmt = $this->pdo->prepare("INSERT INTO MOVIES(id, name, rate, length, film_start, film_end) VALUES(:id, :name, :rate, :length, :start, :end);");
			$stmt->bindParam(':id', $movie->id);
			$stmt->bindParam(':name', $movie->name, PDO::PARAM_STR);
			$stmt->bindParam(':rate', $movie->rate);
			$stmt->bindParam(':length', $movie->length);
			$stmt->bindParam(':start', $movie->film_start);
			$stmt->bindParam(':end', $movie->film_end);
			$stmt->execute();
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function updateMovieInfo (Movie $movie) {
		try{
			$stmt = $this->pdo->prepare("UPDATE movies SET name = :name, rate = :rate, length = :length, film_start = :film_start, film_end = :film_end   WHERE id = :id;");
			$stmt->bindParam(':id', $movie->id);
			$stmt->bindParam(':name', $movie->name, PDO::PARAM_STR);
			$stmt->bindParam(':rate', $movie->rate);
			$stmt->bindParam(':length', $movie->length);
			$stmt->bindParam(':film_start', $movie->film_start);
			$stmt->bindParam(':film_end', $movie->film_end);
			$stmt->execute();
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function getMovieById ($id) { 
		try {
			$stmt = $this->pdo->prepare("SELECT * FROM MOVIES WHERE id = :id;");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return  $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "movie");
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	function deleteMovieById ($id) {
		try {
			$stmt = $this->pdo->prepare("DELETE FROM MOVIES WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return  "Movie deleted!";
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
}
