<?php
/** @var $movies */
/** @var $genres */
/** @var $config */

require_once "data/movies.php";
require_once "helper-functions.php";
require_once "render.php";
require_once "data/config.php";



echo renderTemplate("pages/startpage.php", [
	"content" => "Сайт в разработке",
	"genres" => $genres,
	"movies" => $movies,
	"config" => $config,
]);