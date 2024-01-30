<?php
header('Access-Control-Allow-Origin: *');
// TRAITEMENT DES DONNEES RECUES EN POST -> INSERTION EN BASE
$response = [
    'message' => $_POST['test']
];
echo json_encode($response['message']);