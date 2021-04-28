<?php
require_once 'config.php';

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['add'])){
    extract($_REQUEST);
     $title; $code; $user_id;

    if(empty($username) || empty($title) || empty($code)){
        return header('location: dashboard.php?emptyfields');
     }

    $sql = 'INSERT INTO courses(user_id, title, code) VALUES(?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $user_id, $title, $code);
    if($stmt->execute()){
        session_start();
        $_SESSION['id'] = $user_id;
        header('location: dashboard.php?added_course');
    }
     else{
         header('location: dashboard.php?add_failed') ;
        }

}

elseif (isset($_POST['update'])){
    extract($_REQUEST);
     $title; $code; $id;

    if(empty($title) || empty($code)){
        return header('location: dashboard.php?emptyfields');
     }

     $sql = 'UPDATE courses SET title=?, code=? WHERE id='.$id;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $title, $code);
    if($stmt->execute()){
        session_start();
        $_SESSION['id'] = $id;
        header('location: dashboard.php?course_updated');
    }
     else{
         header('location: dashboard.php?add_failed') ;
        }

}
// delete course
elseif(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = 'DELETE FROM courses Where id='.$id;
    $conn->query($sql) ? header('location: dashboard.php?course_removed') : 'Failed to delete';
}

// logout from dashboard
elseif(isset($_GET['logout'])){
    session_start();

    session_destroy() ? header('location: index.php?logged_out') : die();
}


else{
    return header('location: index.php');
}