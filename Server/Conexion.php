<?php
$servidor = "remotemysql.com";
$db = "ybNq4cirus";
$username = "ybNq4cirus";
$password = "s00IjwuIE3";
// Create connection
$conn = new mysqli($servidor, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}