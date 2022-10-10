<?php
include_once '../config/database.php';

$DB_object = new database();
$db = $DB_object->getConnection();

$upit = "SELECT text FROM pricelist";

$query_solution1 = $db->prepare($upit);
$query_solution1->execute();

$array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

print_r(json_encode($array));
