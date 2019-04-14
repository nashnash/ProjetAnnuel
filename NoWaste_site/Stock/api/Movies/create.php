<?php 
require_once __DIR__.'/../../services/MovieService.php';
require_once __DIR__.'/../../utils/filmValidator.php';

$content = file_get_contents('php://input');
$json = json_decode($content, true);

if(filmValidator::validate($json, ['title', 'duration', 'releaseDate', 'description'])){
	$n = new Movie(NULL,$json)//pas fini
}
else{
	http_response_code(400);
}

 ?>