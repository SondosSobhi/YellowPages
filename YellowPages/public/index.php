<?php
session_start();
$_SESSION['url'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require_once('../app/Controller/FrontController.php');
$front = new FrontController();
$front->dispatch();
?>