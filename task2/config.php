<?php

$host = 'localhost' ?? 'remotemysql.com';
$username = 'root' ?? 'XCuQRHQrPL';
$password ='root' ?? 'G6WvYivkq1';
$dbname ='courseDb' ?? 'XCuQRHQrPL';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

?>