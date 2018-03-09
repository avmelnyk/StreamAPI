<?php

class ProgramScheduler{
	
	var $program_element_pdo;
	var $movie_pdo;
	var $start_time = 1512000000;
	var $week_in_timestamp = 604800;
	var $movie_length = 7200;
	var $all_movie_length = 1800000;
	
	function __construct (ProgramElementPDO $program_element_pdo, MoviePDO $moviepdo) {
		$this->program_element_pdo = $program_element_pdo;
		$this->movie_pdo = $moviepdo;
	}
	
	function scheduleProgaram () {
		$elements = $this->program_element_pdo->getAllProgramElements();
		if (count($elements) == 0) { //перевірка довжини масиву на нуль і побудова Program з нуля 
			$result = round ((time() - $this->start_time  + $this->week_in_timestamp) / $this->all_movie_length, 0, PHP_ROUND_HALF_UP);
			$all_movies = $this->movie_pdo->getAllMovies(); 
			$start = $this->start_time;
			for($i = 0; $i < $result; $i ++){
				foreach($all_movies as $movie){
					$element = new ProgramElement($movie->id, $start, 0);
					$this->program_element_pdo->addProgramElement($element);
					$start += $movie->length;
				}
			}
			return "Будуємо з початку!";	
		}
		
		else if ((end($elements)->movie_start - time()) < 518400000 ) {	//перевірка Program на час. Якщо менше необхідного то побудова з останього елементу
				$result = round((time() + $this->week_in_timestamp - end($elements)->movie_start) / $this->all_movie_length, 0, PHP_ROUND_HALF_UP);
				$all_movies = $this->movie_pdo->getAllMovies();
				$start = end($elements)->movie_start;
				for($i = 0; $i < $result; $i ++){
					foreach($all_movies as $movie){
						$element = new ProgramElement($movie->id, $start, 0);
						$this->program_element_pdo->addProgramElement($element);
						$start += $movie->length;
					}
				}
			return "Будуємо з останього елементу!";
		}
		else { //Program має нормальну довжину SUCCESS
			
		}
	}
	
}
