<?php

include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

$movie_object->comment_id = isset($_GET['comment_id']) ? $_GET['comment_id'] : die();

$query_solution = $movie_object->Delete_comment();

print_r(json_encode($query_solution));
