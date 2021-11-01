<?php

include 'movies.php';

$age = readline("Введи свой возраст:");
if (is_numeric($age)) {
	printMovies($movies, $age);
} else {
	echo "Вы ввели не правильное значение.";
}






