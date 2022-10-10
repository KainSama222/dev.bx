<?php
function formatDescription(string $text): string
{
	return mb_strimwidth($text, 0, 125, "...");
}

function formatArray(array $genresArray): string
{
	return (implode(", ", $genresArray));
}

function formatTime($time)
{
	$hours = floor($time / 60);
	$min = $time % 60;
	$h = str_pad((string)$time, 2, "0", STR_PAD_LEFT);
	return ((string)$hours . ":" . (string)$min . "/" . $time . " мин.");
}

function filterGenre($movies, $getMovieGenre): array
{
	if ($getMovieGenre === "main") {
		return $movies;
	}
	$filtredMovieByGenre = [];
	foreach ($movies as $movie) {
		if (in_array($getMovieGenre, $movie['genres'])) {
			$filtredMovieByGenre[] = $movie;
		}
	}
	return $filtredMovieByGenre;
}

function curentMenuBlock($getMovieGenre, $genre)
{
	return ($genre === $getMovieGenre);
}

function curentMovieDetails($movies, $getMovieID): array
{
	foreach ($movies as $movie) {
		if ($movie["id"] === (int)$getMovieID) {
			return $movie;
		}
	}
	return ['id' => 1, $getMovieID];
}

function rating($i, $rating): int
{
	$whole = floor($rating);
	$decimal = ($rating - $whole);

	if ($i < $whole) {
		return 100;
	}elseif ($i > $whole) {
		return 0;
	}
	return $decimal * 100;
}

