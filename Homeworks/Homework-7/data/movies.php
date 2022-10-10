<?php

function getGenreOrActors($database, $type = "isGenre")
{
	$array = [];
	if ($type === "isGenre") {
		$query = "SELECT * FROM dev.genre";
	}
	else{
		$query = "SELECT * FROM dev.actor";
	}
	$result = mysqli_query($database, $query);
	if (!$result) {
		processDbError($database);
	}
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row["ID"];
		$name = $row["NAME"];
		$array[$id] = $name;
	}

	return $array;}


function getMovies($database,$genres,$actors = "", $IDGenre = "")
{
	$movies = [];

	$query = "
		SELECT movie.ID as id,
				TITLE as title,
				ORIGINAL_TITLE as 'original-title',
				DESCRIPTION as description,
				DURATION as duration,
				d.NAME as director,
				AGE_RESTRICTION as 'age-restriction',
				RELEASE_DATE as 'release-date',
				RATING as rating,
				(SELECT GROUP_CONCAT(mg.GENRE_ID SEPARATOR ', ') FROM movie_genre mg
				WHERE movie.ID = mg.MOVIE_ID) genres,
				(SELECT GROUP_CONCAT(ma.ACTOR_ID SEPARATOR ', ') FROM movie_actor ma
				WHERE movie.ID = ma.MOVIE_ID) actors
		FROM movie
		inner join director d on d.ID = movie.DIRECTOR_ID
	";
	if ($IDGenre !== ""){
		$query .= " inner join movie_genre mg on movie.ID = mg.MOVIE_ID WHERE mg.GENRE_ID = $IDGenre ";
	}
	$result = mysqli_query($database, $query);
	if (!$result) {
		processDbError($database);
	}

	while ($row = mysqli_fetch_assoc($result)) {
		$row['genres'] = convertIDtoNames($genres,$row['genres']);
		if($actors!= "") {
			$row['actors'] = convertIDtoNames($actors, $row['actors']);
		}
		$movies[] = $row;
	}
	return $movies;
}
