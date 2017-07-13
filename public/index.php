<?php

include_once('../autoloader.php');

use App\Controller;

$action = isset($_GET['action']) ? $_GET['action'] : '';

$controller = new Controller($action);
$controller->execute();
