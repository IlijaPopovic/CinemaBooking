<?php

include_once '../config/database.php';
include_once '../objects/hall.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$hall_object->cinema_id = isset($_GET['cinema_id']) ? $_GET['cinema_id'] : die();

$query_solution = $hall_object->Delete_cinema();

print_r(json_encode($query_solution));
