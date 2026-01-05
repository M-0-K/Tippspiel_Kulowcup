<?php
/*
// XAMPP Local Database Connection Script
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$DSN = 'mysql:host=localhost;dbname=tippspiel';
$DB_USER = 'webserver';
$DB_PW = '47114711';

// Umgebungsvariablen aus Apache verfügbar machen
if (!isset($_ENV['CURRENT_TURNIER'])) {
    $_ENV['CURRENT_TURNIER'] = getenv('CURRENT_TURNIER') ?: 50;
}

/*
$DSN = 'mysql:host=wdb2.hs-mittweida.de;dbname=mkockert';
$DB_USER = 'mkockert';
$DB_PW = 'mei!cav3Aich';

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
*/
// Docker XAMPP Local Database Connection Script
error_reporting(E_ALL);
ini_set('display_errors', 0); // im Web lieber aus, sonst zerschießt es Redirects

$DSN = 'mysql:host=db;port=3306;dbname=tippspiel;charset=utf8mb4';
$DB_USER = 'webserver';
$DB_PW   = '';

$options = [
  PDO::ATTR_PERSISTENT => false,
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
];

try {
  $db = new PDO($DSN, $DB_USER, $DB_PW, $options);
} catch (PDOException $e) {
  error_log("DB ERROR: " . $e->getMessage());
  http_response_code(500);
  exit("Server error"); // oder: throw $e;
}
