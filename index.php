<?php
const apiUrl = "https://whenisthenextmcufilm.com/api";
# initializar una nueva session the curl; ch = curl handle
$ch = curl_init(apiUrl);
//indicar que queremos recibir el resultado de la petition y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
Ejecutar la petition 
guardar el resultado
*/

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

#var_dump($data)



?>

<head>
	<meta charset='UTF-8' />
	<title>La Proxima Pelicula De Marvel</title>
	<meta name='description' content='La proxima pelicula de marvel' />
	<meta name='viewport' content='width=device=width, initial-scale=1.0' />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
	<section>
	<img src='<?= $data['poster_url']; ?>' width='200' alt='Poster de <?= $data['title']; ?>' 
	style='border-radius: 16px' />
	</section>

	<hgroup>
		<h3><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> dias</h3>
		<p>Fecha de estreno: <?= $data['release_date']; ?></p>
		<p>La siguiente es: <?= $data['following_production']['title']; ?></p>
	</hgroup>
</main>

<style>
:root {
	color-scheme:light dark;
}

body {
	display: grid;
	place-content: center;
}

section {
	display: flex;
	justify-content: center;
}

hgroup {
	display: flex;
	flex-direction: column;
	justify-content: center;
	text-align: center;
}

img {
	margin: 0 auto;
}

</style>
