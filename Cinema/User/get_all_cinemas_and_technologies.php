<?php

include_once '../config/database.php';
include_once '../objects/hall.php';

$hall_object = new database();
$db = $hall_object->getConnection();

$hall_object = new hall($db);
$query_solution = $hall_object->Get_all_cinemas_and_technologies();

print_r(json_encode($query_solution));
