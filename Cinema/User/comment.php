<?php

include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_client();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$movie_object->id = isset($_GET['id']) ? $_GET['id'] : die();
$movie_object->comment = isset($_GET['comment']) ? $_GET['comment'] : die();
$movie_object->grade = isset($_GET['grade']) ? $_GET['grade'] : die();
$movie_object->client = isset($_GET['client']) ? $_GET['client'] : die();

$query_solution = $movie_object->Comment();

print_r(json_encode($query_solution));
