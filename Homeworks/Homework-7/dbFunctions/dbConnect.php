<?php

function dbconnect($configdb):mysqli{
	$database = mysqli_init();
	$host = $configdb['host'];
	$username = $configdb['username'];
	$password = $configdb['password'];
	$dbname = $configdb['dbName'];
	$connectionResult = mysqli_real_connect($database, $host, $username, $password,$dbname);

	if (!$connectionResult)
	{
		$error = mysqli_connect_errno() . ": " . mysqli_connect_error();
		trigger_error($error, E_USER_ERROR);
	}

	$charsetResult = mysqli_set_charset($database, "utf8mb4");

	if (!$charsetResult)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	};

	return $database;
};

