<?php

session_start();
include 'controllers/connexion_bdd_controller.php';
include 'views/layout.php';
include_once 'controllers/controller.php';
$controller = new Controller();
$controller->invoke();