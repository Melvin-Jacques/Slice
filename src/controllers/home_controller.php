<?php
// Gestion du logout
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout']) ) {
    unset($_SESSION['user']);
    header('location: ?page=home');
}
require 'public/views/home.php';