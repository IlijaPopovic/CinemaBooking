<?php
include_once '../config/database.php';
include_once '../objects/hall.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$hall_object = new hall($db);

$hall_object->address = isset($_POST['address']) ? $_POST['address'] : die();
$hall_object->phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : die();
$hall_object->city = isset($_POST['city']) ? $_POST['city'] : die();
$hall_object->cinema_name = isset($_POST['name']) ? $_POST['name'] : die();
$hall_object->about_cinema = isset($_POST['about_cinema']) ? $_POST['about_cinema'] : die();
$hall_object->cinema_id = isset($_POST['cinema_id']) ? $_POST['cinema_id'] : die();
$old_image_cinema = isset($_POST['old_image_cinema']) ? $_POST['old_image_cinema'] : die();

if (isset($_FILES["cinema_image"]["name"])) {
    $file = $_FILES['cinema_image'];

    $fileName = $_FILES['cinema_image']['name'];
    $fileTmpName = $_FILES['cinema_image']['tmp_name'];
    $fileSize = $_FILES['cinema_image']['size'];
    $fileError = $_FILES['cinema_image']['error'];
    $fileType = $_FILES['cinema_image']['type'];

    $fileCut = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileCut));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $hall_object->cinema_image = $fileNameNew;

                $query_solution = $hall_object->Change_cinema();
                unlink('images/' . $old_image_cinema);
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
    $hall_object->cinema_image = $old_image_cinema;
    $query_solution = $hall_object->Change_cinema();
}
print_r(json_encode($query_solution));
