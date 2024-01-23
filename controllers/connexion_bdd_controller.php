<?php
$server = 'localhost';
$login = 'root';
$mdp = '';
$db = 'slicebdd';

try{
    $bdd = new PDO("mysql:host=$server;dbname=$db",$login,$mdp, 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->query('SET NAMES UTF8');
    return $bdd;
}
catch(PDOException $e) {
    $msg = 'ERREUR dans ' . $e->getFile() . ' Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
    exit($msg);
}
