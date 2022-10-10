<?php

include_once '../config/database.php';
include_once '../objects/client.php';

$DB_object = new Database();
$db = $DB_object->getConnection();


$client_object = new client($db);

$client_object->user_name = isset($_POST['username']) ? $_POST['username'] : die();
$client_object->password = isset($_POST['password']) ? $_POST['password'] : die();

$query_solution = $client_object->Log_in();

print_r(json_encode($query_solution));
