<?php
/** @var $movies */
/** @var $genres */
/** @var $config */
/** @var $configdb */
/** @var $selectedMovie */

require_once "dbFunctions/dbConnect.php";
require_once "data/movies.php";
require_once "helper-functions.php";
require_once "render.php";
require_once "data/config.php";


$db = dbconnect($configdb);
$genres = getGenreOrActors($db);
$actors = getGenreOrActors($db,"isActors");

$getMovieID = $_GET['getMovieID'] ?? '1';

$movies = getMovies($db, $genres,$actors);

$content = renderTemplate("pages/detailsMovie.php", [
	"movie" => curentMovieDetails($movies,$getMovieID)
]);

echo renderTemplate("pages/startpage.php", [
	"content" => $content,
	"genres" => $genres,
	"config" => $config,
	"getMovieID" => $getMovieID,
]);