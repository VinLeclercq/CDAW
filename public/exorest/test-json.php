<?php

	
$films = json_decode(file_get_contents('https://imdb-api.com/en/API/MostPopularMovies/k_by0384ww'), true, 99);

	$allFilms = '<table><tr><td>Id</td><td>Rank</td><td>title</td></tr>';
	foreach($films['items'] as $film) {
		$allFilms .= '<tr><td>'.$film['id'].'</td><td>'.$film['rank'].'</td><td>'.$film['title'].'</td></tr>';
	}
	$allFilms .= "</table>";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
		table {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}

		td {
			text-align: center;
			padding-left: 2em;
			padding-right: 2em;
		}
		</style>
	</head>
	<body>
	<h1>top 100</h1>
		<?php
			echo $allFilms;
		?>
	</body>
</html>