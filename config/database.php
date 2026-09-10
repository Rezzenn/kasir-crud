<?php
session_start();

$host       = 'localhost';
$db_name    = 'db_kasir_php';
$username   = 'root';
$password   = '';

$db = new mysqli($host, $username, $password, $db_name);

?>