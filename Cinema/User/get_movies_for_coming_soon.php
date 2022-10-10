<?php

include_once '../config/database.php';
include_once '../objects/movie.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$query_solution = $movie_object->Get_movies_for_coming_soon();

print_r(json_encode($query_solution));
