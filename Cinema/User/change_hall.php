<?php
include_once '../config/database.php';
include_once '../objects/hall.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$hall_object->name = isset($_POST['name']) ? $_POST['name'] : die();
$hall_object->number_seat = isset($_POST['number_seat']) ? $_POST['number_seat'] : die();
$hall_object->number_rows = isset($_POST['number_rows']) ? $_POST['number_rows'] : die();
$hall_object->number_vip_rows = isset($_POST['number_vip_rows']) ? $_POST['number_vip_rows'] : die();
$hall_object->screen_size = isset($_POST['screen_size']) ? $_POST['screen_size'] : die();
$hall_object->cinema_id = isset($_POST['cinema_id']) ? $_POST['cinema_id'] : die();
$hall_object->technology_id = isset($_POST['technology_id']) ? $_POST['technology_id'] : die();
$hall_object->hall_id = isset($_POST['hall_id']) ? $_POST['hall_id'] : die();
$old_hall_picture = isset($_POST['old_hall_picture']) ? $_POST['old_hall_picture'] : die();

if (isset($_FILES["hall_picture"]["name"])) {
    $file = $_FILES['hall_picture'];

    $fileName = $_FILES['hall_picture']['name'];
    $fileTmpName = $_FILES['hall_picture']['tmp_name'];
    $fileSize = $_FILES['hall_picture']['size'];
    $fileError = $_FILES['hall_picture']['error'];
    $fileType = $_FILES['hall_picture']['type'];

    $fileCut = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileCut));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $hall_object->hall_picture = $fileNameNew;

                $query_solution = $hall_object->Change_hall();
                unlink('images/' . $old_hall_picture);
            } else {
                $query_solution = array('status' => 'File too large');
            }
        } else {
            $query_solution = array('status' => 'File error');
        }
    } else {
        $query_solution = array('status' => 'Not a image');
    }
} else {
    $hall_object->hall_picture = $old_hall_picture;
    $query_solution = $hall_object->Change_hall();
}

print_r(json_encode($query_solution));
