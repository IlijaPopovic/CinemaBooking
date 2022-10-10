<?php
include_once '../config/database.php';
include_once '../objects/hall.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$hall_object->technology_name = isset($_GET['technology_name']) ? $_GET['technology_name'] : die();
$hall_object->technology_price = isset($_GET['technology_price']) ? $_GET['technology_price'] : die();
$hall_object->technology_discount = isset($_GET['technology_discount']) ? $_GET['technology_discount'] : die();;

$query_solution = $hall_object->Insert_technology();

print_r(json_encode($query_solution));
