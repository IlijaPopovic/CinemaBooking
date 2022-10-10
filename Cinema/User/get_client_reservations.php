<?php

include_once '../config/database.php';
include_once '../objects/client.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$client_object = new client($db);

$client_object->id = isset($_GET['id']) ? $_GET['id'] : die();

$query_solution = $client_object->Get_client_reservations();

print_r(json_encode($query_solution));
