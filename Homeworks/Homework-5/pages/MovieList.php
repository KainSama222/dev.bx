<?php
/** @var array $movies */
?>

<?php foreach ($movies as $movie):?>
	<div class="movie-list-item">
		<div class="movie-overlay">
			<a class="more-btn" href="./indexDetailsMovie.php?getMovieID=<?= $movie['id']?>">Подробнее</a>
		</div>
		<div class="movie-list-item-poster"
			 style="
				 background: url('data/images/<?= $movie["id"];?>.jpg') no-repeat;
				 background-size: cover ;
				 "></div>
		<div class="movie-list-item-header">
			<div class="movie-list-item-header-title"><?= $movie["title"];?></div>
			<div class="movie-list-item-header-subtitle"><?= $movie["original-title"];?></div>
		</div>
		<div class="movie-list-item-description"><?= formatDescription($movie["description"]);?></div>
		<div class="movie-list-item-footer">
			<div class="movie-list-item-footer-times">
				<div class="movie-list-item-footer-times-icon"></div>
				<div class="movie-list-item-footer-times-time"><?= formatTime($movie["duration"]);?></div>
			</div>
			<div class="movie-list-item-footer-genres"><?= formatArray($movie['genres']);?></div>
		</div>
	</div>
<?php endforeach;?>