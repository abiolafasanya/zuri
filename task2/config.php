<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host = '127.0.0.1' ?? $url["host"];
$username ='root' ?? $url["user"];
$password ='' ?? $url["pass"];
$dbname =substr($url["path"], 1) ?? 'courseDb';

$conn = new mysqli($host, $username, $password, $dbname);
$conn ? $conn : die('Failed to connect Db: '.$conn->error);

//
$sql_user = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL
  ) ";
  $user_table = $conn->query($sql_user);
//   $user_table ? "Users Table Created" : "Failed to Create Users Taable";
  
  $sql_courses = "CREATE TABLE IF NOT EXISTS `courses` (
    `id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `title` varchar(100) NOT NULL,
    `code` varchar(100) NOT NULL,
    `created_at` date NOT NULL DEFAULT current_timestamp())";
    $course_table = $conn->query($sql_user);
    // $course_table ? "Course Table Created" : "Failed to Create Course Taable";
?>