<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chat_db";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo "Error ". mysqli_connect_error();
} 
