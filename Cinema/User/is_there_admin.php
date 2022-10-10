<?php

session_start();
if (isset($_SESSION['admin'])) {
    $callback_array = array(
        "id_admin" => $_SESSION['admin']
    );
} else {
    $callback_array = array(
        "id_admin" => "no_logged_admin"
    );
}
print_r(json_encode($callback_array));
