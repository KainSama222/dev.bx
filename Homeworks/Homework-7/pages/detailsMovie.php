<?php
/** @var array $movie */
/** @var int $getMovieID */

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<div class="movieCard">
	<div class="movieCard-header">
		<div class="movieCard-header-titles">
			<div class="movieCard-header-title"><?= $movie['title'] ?></div>
			<div class="movieCard-header-subtitle">
				<div class="movieCard-header-subtitle-text"><?= $movie['original-title'] ?></div>
				<div class="movieCard-header-subtitle-ageLimit"><?= $movie['age-restriction'] ?>+</div>
			</div>
		</div>
		<div class="movieCard-header-favoritesIcon"></div>
	</div>
	<div class="movieCard-info">
		<div class="movieCard-logo"
			 style="
					 background: url('data/images/<?= $movie['id'] ?>.jpg') no-repeat;
					 background-size: cover"></div>
		<div class="movieCard-info-Text">
			<div class="movieCard-about">
				<div class="movieCard-rating">

					<?php for ($i = 0; $i < 10; $i++): ?>
						<?php $rating = rating($i, $movie['rating']); ?>
						<div class="movieCard-rating-block" style="
								background: linear-gradient(90deg, #E78818 <?= $rating; ?>%, #F2F2F2 <?= $rating; ?>%);"></div>
					<?php endfor; ?>

					<div class="movieCard-rating-circle"><?= $movie['rating'] ?></div>
				</div>
				<div class="movieCard-Caption">О фильме</div>
				<div class="info">
					<div class="info-block">
						<div class="info-block-name">Год производства:</div>
						<div class="info-block-value"><?= $movie['release-date'] ?></div>
					</div>
					<div class="info-block">
						<div class="info-block-name">Режиссер:</div>
						<div class="info-block-value"><?= $movie['director'] ?></div>
					</div>
					<div class="info-block">
						<div class="info-block-name">В главных ролях:</div>
						<div class="info-block-value"><?= formatArray($movie["actors"]) ?>
						</div>
					</div>
				</div>
			</div>
			<div class="movieCard-description">
				<div class="movieCard-Caption">Описание</div>
				<div class="movieCard-description-text"><?= $movie['description'] ?></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>