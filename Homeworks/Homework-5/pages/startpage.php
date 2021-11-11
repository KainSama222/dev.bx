<?php
/** @var array $movies */
/** @var array $genres */
/** @var array $config */
/** @var string $content */
/** @var string $getMovieGenre */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="./styles/main.css">
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
			<div class="logo"></div>
			<div class="menu">
				<a href="index.php" class="menu-item <?= $getMovieGenre === "main" ? 'menu-item-curent':''?>"><?= $config['main']?></a>
				<?php foreach ($genres as $genre):?>
					<a href="index.php?MenuGenre=<?=$genre?>" class="menu-item <?= curentMenuBlock($getMovieGenre,$genre) ? 'menu-item-curent':''?>"><?= $genre?></a>
				<?php endforeach;?>
				<a href="./indexFavorites.php" class="menu-item <?= $getMovieGenre === "favorite" ? 'menu-item-curent':''?>"><?= $config['favorites']?></a>
			</div>
		</div>
		<div class="container">
			<div class="header">
				<div class="search-bar">
					<div class="search">
						<div class="search-icon"></div>
						<input type="text" class="search-bar-textbox" placeholder="Поиск по каталогу..." >
					</div>
					<input type="button" class="btn search-btn" value="Искать">
				</div>
				<a class="btn add-movie-btn" href="indexAddMovie.php">Добавить Фильм</a>
			</div>
			<div class="content">
				<?=$content?>
			</div>
		</div>
	</div>
</body>
