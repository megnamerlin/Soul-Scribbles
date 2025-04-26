<?php
session_start();
$host = 'sql12.freesqldatabase.com';
$port = 3306;  
$db   = 'sql12775387';
$user = 'sql12775387';
$pass = 'ZTDcnj2zmw';

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
