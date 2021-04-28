<?php
require_once 'config.php';

// registration code
if(isset($_POST['register'])){

    extract($_REQUEST);
    if(empty($username) || empty($email) || empty($password)){
       return header('location: index.php?emptyfields');
    }

    // putting extracted data into an array
    $user = array(
        'username' => test_input($username),
        'email' =>test_input($email),
        'password' => test_input($password) 
    );

    $username = $user["username"];
    $email = $user["email"];
    $password = password_hash($user["password"], PASSWORD_DEFAULT);

    //CHECK FOR USER 
    $query = 'SELECT username FROM users WHERE username=?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($res);

    $stmt->fetch();

   if($res === $username){
       //if user exists and redirect to index page
    //    return header('location: index.php?User_Exists');
   }

   // iNSERT INTO DATABASE
   $sql = 'INSERT INTO users(username, email, password) 
    VALUES(?,?,?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);
    $stmt->execute();
    
    $stmt->execute() ? header('location: index.php?success_registration'): 'An error occured';

}

//login codes
elseif(isset($_POST['login'])){
    extract($_REQUEST);

    if(empty($username) || empty($password)){
       return header('location: index.php?emptyfields');
    }
 

    //CHECK FOR USER 
    $query = 'SELECT * FROM users WHERE username=? OR email=? LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $email);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = true;
                header('location: dashboard.php');
        }
        else{
            header('location: index.php?worng_credentials');
        }
   }

}

//password reset
elseif(isset($_POST['pwd_reset'])){
    extract($_REQUEST);
    if(empty($password) || empty($confirm_password)){
        return header('location: dashboard.php?emptyfields');
     }
     $username; $id;
      $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
     if($password === $confirm_password){
        $sql = 'UPDATE users SET password=?  WHERE id=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $hashed_pwd, $id);
        if($stmt->execute()){
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header('location: dashboard.php?password_updated');
        }
        else{
            header('location: dashboard.php?add_failed');
            }
    }
}

// UnAuthorized Page
else{
    '<pre>';
        var_dump( 
            array("message" => 'Uncaught request')
            );
    '</pre>';
}



    //input validation
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }