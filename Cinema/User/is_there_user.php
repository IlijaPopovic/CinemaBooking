<?php

session_start();
if (isset($_SESSION['user'])) {
    $callback_array = array(
        "id_user" => $_SESSION['user']
    );
} else {
    $callback_array = array(
        "id_user" => "no_logged_user"
    );
}
print_r(json_encode($callback_array));
