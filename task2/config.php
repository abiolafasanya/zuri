<?php

$host = 'remotemysql.com';
$username ='XCuQRHQrPL';
$password ='G6WvYivkq1';
$dbname ='XCuQRHQrPL';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

?>