<?php

include_once '../config/database.php';
include_once '../objects/movie.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$movie_object->id = isset($_GET['id']) ? $_GET['id'] : die();

$query_solution = $movie_object->Get_repertoire_for_movie();

echo json_encode($query_solution);
