<?php
include_once '../config/database.php';
include_once '../objects/movie.php';
include_once '../objects/check_session.php';
Check_session_admin();

$DB_object = new database();
$db = $DB_object->getConnection();

$movie_object = new movie($db);

//$movie_object->poster = isset($_POST['poster']) ? $_POST['poster'] :die(); 2019-08-08
$movie_object->name = isset($_POST['name']) ? $_POST['name'] : die();
$movie_object->description = addslashes(isset($_POST['description']) ? $_POST['description'] : die());
$movie_object->lenght = isset($_POST['lenght']) ? $_POST['lenght'] : die();
$movie_object->beginning = isset($_POST['beginning']) ? $_POST['beginning'] : die();
$movie_object->language = isset($_POST['language']) ? $_POST['language'] : die();
$movie_object->trailer_youtube = isset($_POST['trailer_youtube']) ? $_POST['trailer_youtube'] : die();
$movie_object->genre = isset($_POST['genre']) ? $_POST['genre'] : die();
$movie_object->actors = isset($_POST['actors']) ? $_POST['actors'] : die();

if ($_FILES["poster"]["name"] != '') {
    $file = $_FILES['poster'];

    $fileName = $_FILES['poster']['name'];
    $fileTmpName = $_FILES['poster']['tmp_name'];
    $fileSize = $_FILES['poster']['size'];
    $fileError = $_FILES['poster']['error'];
    $fileType = $_FILES['poster']['type'];

    $fileCut = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileCut));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $movie_object->poster = $fileNameNew;

                $query_solution = $movie_object->Insert_movie();
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
    die();
}

print_r(json_encode($query_solution));
