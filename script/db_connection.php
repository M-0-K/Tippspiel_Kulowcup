<?php

//error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$DSN = 'mysql:host=localhost;dbname=tippspiel';
$DB_USER = 'website';
$DB_PW = '47114711';
$DB_options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_PERSISTENT => true
);

global $db;
try {
    $db = new PDO($DSN, $DB_USER, $DB_PW, $DB_options);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $err) {
    echo 'DB ERROR: ' . $err->getMessage() . PHP_EOL;
}

if ($db) {
    //echo "Verbindung hergestellt. <br>";
}

