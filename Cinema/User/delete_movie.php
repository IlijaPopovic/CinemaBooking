<?php

include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$movie_object->movie_id = isset($_GET['movie_id']) ? $_GET['movie_id'] : die();

$query_solution = $movie_object->Delete_movie();

print_r(json_encode($query_solution));
