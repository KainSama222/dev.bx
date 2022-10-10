<?php
/** @var $movies */
/** @var $genres */
/** @var $config */
/** @var $selectedMovie */

require_once "data/movies.php";
require_once "helper-functions.php";
require_once "render.php";
require_once "data/config.php";

$getMovieID = $_GET['getMovieID'] ?? '1';


$content = renderTemplate("pages/detailsMovie.php", [
	"movie" => curentMovieDetails($movies,$getMovieID)
]);
echo renderTemplate("pages/startpage.php", [
	"content" => $content,
	"genres" => $genres,
	"config" => $config,
	"getMovieID" => $getMovieID,
]);