<?php

session_start();
session_destroy();

$solution = array('status' => 'logged_out');
print_r(json_encode($solution));
