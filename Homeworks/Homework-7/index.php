<?php
/** @var $movies */
/** @var $genres */
/** @var $config */
/** @var $configdb */


require_once "dbFunctions/dbConnect.php";
require_once "data/movies.php";
require_once "helper-functions.php";
require_once "render.php";
require_once "data/config.php";

$getMovieGenre = $_GET['MenuGenre'] ?? 'main';
$db = dbconnect($configdb);
$genres = getGenreOrActors($db);

if (array_key_exists($getMovieGenre, $genres)) {
	$movies = getMovies($db, $genres,$getMovieGenre);
}else{
	$movies = getMovies($db, $genres);
};

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