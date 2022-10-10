<?php

include_once '../config/database.php';
include_once '../objects/client.php';
include_once '../objects/check_session.php';
Check_session_client();

$DB_object = new database();
$db = $DB_object->getConnection();

$client_object = new client($db);

$client_object->reserved_place_id = isset($_GET['reserved_place_id']) ? $_GET['reserved_place_id'] : die();

$query_solution = $client_object->Delete_client_reservation();

print_r(json_encode($query_solution));
