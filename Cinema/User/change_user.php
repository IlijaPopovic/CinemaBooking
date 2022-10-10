<?php
include_once '../config/database.php';
include_once '../objects/client.php';
include_once '../objects/check_session.php';
Check_session_client();

$DB_object = new database();
$db = $DB_object->getConnection();

$client_object = new client($db);

$client_object->name = isset($_POST['name1']) ? $_POST['name1'] : die("Name problem");
$client_object->surname = isset($_POST['surname']) ? $_POST['surname'] : die();
$client_object->date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : die();
$client_object->mail = isset($_POST['mail']) ? $_POST['mail'] : die();
$client_object->phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : die();
$client_object->password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : die();
$client_object->user_name = isset($_POST['user_name']) ? $_POST['user_name'] : die();
$client_object->address = isset($_POST['address']) ? $_POST['address'] : die();
$client_object->city = isset($_POST['city']) ? $_POST['city'] : die();
$client_object->id = isset($_POST['id']) ? $_POST['id'] : die();

$query_solution = $client_object->Change_user();

print_r(json_encode($query_solution));
