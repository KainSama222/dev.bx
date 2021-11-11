<?php
/** @var $movies */
/** @var $genres */
/** @var $config */

require_once "data/movies.php";
require_once "helper-functions.php";
require_once "render.php";
require_once "data/config.php";

$getMovieGenre = $_GET['MenuGenre'] ?? 'main';

$content = renderTemplate("pages/MovieList.php", [
	"movies" => filterGenre($movies,$getMovieGenre),
]);

echo renderTemplate("pages/startpage.php", [
	"content" => $content,
	"genres" => $genres,
	"movies" => $movies,
	"config" => $config,
	"getMovieGenre" => $getMovieGenre,
]);