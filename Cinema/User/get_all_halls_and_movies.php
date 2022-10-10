<?php

include_once '../config/database.php';
include_once '../objects/movie.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);
$query_solution = $movie_object->Get_all_halls_and_movies();

print_r(json_encode($query_solution));
