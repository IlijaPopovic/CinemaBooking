<?php
include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$movie_object->movie_id = isset($_POST['movie_id']) ? $_POST['movie_id'] : die();
$movie_object->projection_date = isset($_POST['projection_date']) ? $_POST['projection_date'] : die();
$movie_object->hall_id = isset($_POST['hall_id']) ? $_POST['hall_id'] : die();

$query_solution = $movie_object->Insert_projection();

print_r(json_encode($query_solution));
