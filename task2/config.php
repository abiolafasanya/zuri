<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'courseDb';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

?>