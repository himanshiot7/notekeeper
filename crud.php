<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "note_keeper";
$userstbl = "users";
$notestbl = "notes";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
echo "Connected successfully\n";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: ". $conn->error. "\n";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
echo "Connected to database $dbname successfully\n";

$sql = "CREATE TABLE IF NOT EXISTS $userstbl (
    `name` VARCHAR(30) NOT NULL,
    `email` VARCHAR(30) NOT NULL PRIMARY KEY,
    `password` VARCHAR(15) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table $userstbl created successfully\n";
} else {
    echo "Error creating table: ". $conn->error. "\n";
    echo "Error Code: ". $conn->errno. "\n";
    echo "Error Message: ". $conn->error_list[0]['error']. "\n";
}

$sql = "CREATE TABLE IF NOT EXISTS $notestbl (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `note_title` VARCHAR(50) NOT NULL,
    `note_content` VARCHAR(100) NOT NULL,
    `user_id` VARCHAR(30) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table $notestbl created successfully\n";
} else {
    echo "Error creating table: ". $conn->error. "\n";
    echo "Error Code: ". $conn->errno. "\n";
    echo "Error Message: ". $conn->error_list[0]['error']. "\n";
}

$conn->close();
?>
