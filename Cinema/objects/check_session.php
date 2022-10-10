<?php
session_start();
function Check_session_client()
{
    if (!isset($_SESSION['user'])) {
        die();
    }
}

function Check_session_admin()
{
    if (!isset($_SESSION['admin'])) {
        die();
    }
}
