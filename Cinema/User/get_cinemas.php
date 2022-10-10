<?php

include_once '../config/database.php';
include_once '../objects/hall.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$query_solution = $hall_object->Get_cinemas();

print_r(json_encode($query_solution));
