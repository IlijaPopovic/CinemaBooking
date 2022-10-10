<?php

include_once '../config/database.php';
include_once '../objects/hall.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$hall_object->hall_id = isset($_GET['hall_id']) ? $_GET['hall_id'] : die();

$query_solution = $hall_object->Delete_hall();

print_r(json_encode($query_solution));
