<?php
define('DB_HOST','localhost');
define('DB_USER','newuser');
define('DB_PASSWORD','password');
define('DB_NAME','BBE');

// create connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

// check connection
if($conn->connect_error){
    die('connection failde' . $conn->connect_error);
}
// echo 'CONNECTED!'
?>




