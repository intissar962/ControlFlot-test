<?php
//Connection à la BD
$host = 'localhost';
$db_name = 'cimentsmaroc';
$user = 'root';
$passe = '';
$port = '3306';

try {
    $db = new PDO(
        'mysql:host=' .
        $host .
        '; port=' .
        $port .
        ';  dbname=' .
        $db_name .
        '; charset=utf8',
        $user,
        $passe
    );
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

global $db;