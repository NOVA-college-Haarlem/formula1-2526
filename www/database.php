<?php

// Database configuration
$host = 'mariadb';
$user = 'root';
$password = 'password';
$database = 'Formula1';

// Create connection (procedural, not object-oriented)
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// ...your code