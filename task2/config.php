<?php

$host = 'remotemysql.com';
$username ='XCuQRHQrPL';
$password ='G6WvYivkq1';
$dbname ='XCuQRHQrPL';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

// for local database the tables are available in sql folder
//you can use anydatabase just upload the sql folder in phpmyadmin
/*
    $host ="localhost";
    $username ="root";
    $password = "";
    $dbname = "course db";
*/
?>