<?php
include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_client();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);
$movie_object->projection_id = isset($_GET['projection_id']) ? $_GET['projection_id'] : die();
$movie_object->client_id = isset($_GET['client_id']) ? $_GET['client_id'] : die();
$movie_object->reservation_date = date('Y-m-d');
$movie_object->place_array = json_decode(isset($_GET['place_array']) ? $_GET['place_array'] : die());


$query_solution = $movie_object->Insert_reservation();

print_r(json_encode($query_solution));
