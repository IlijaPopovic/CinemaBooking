<?php
include_once '../config/database.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$text = isset($_GET['text']) ? $_GET['text'] : die();

$upit = "UPDATE pricelist SET text= '$text' WHERE id=1";

$query_solution1 = $db->prepare($upit);
$query_solution1->execute();

$array = array('status' => 'changed');

print_r(json_encode($array));
