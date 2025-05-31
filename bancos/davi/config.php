<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');
session_start();


error_reporting(E_ALL); 
ini_set('display_errors', 1); 

function getConnection() {
    $host = 'localhost';
    $user = 'u364214025_panel';
    $pass = '~i|4~@3Q';
    $db = 'u364214025_panel';
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    return $conn;
}
?>