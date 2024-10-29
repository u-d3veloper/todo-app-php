<?php
// Include the database configuration file
require_once 'db-conf.php';
require_once 'style-conf.php';
require_once 'script-conf.php';


// Try the connection to database
try {
    $conn = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DB_NAME, USER, PASSWORD);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

    require "app.php";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



// Close the connection
$conn = null;
