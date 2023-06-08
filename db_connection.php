<?php
// Подключение к базе данных MySQL
$servername = "localhost";
$username = "root";
$password = "number1er";
$dbname = "pets";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
