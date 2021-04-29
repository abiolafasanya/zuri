<?php

$host = '127.0.0.1' ?? 'https://remotemysql.com/';
$username ='root' ?? 'XCuQRHQrPL';
$password ='' ?? 'G6WvYivkq1';
$dbname = 'courseDb' ?? 'XCuQRHQrPL';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

?>