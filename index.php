<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Validation and Database File system</title>
</head>
<body>
    <div class="container">
    <div class="jumbotron h1 text-center">Form Validation, Session and Database File system</div>
        <?php if(isset($_GET['home'])):  
            session_start();    
        ?>
        
            <div class="alert alert-<?=$_SESSION['msg_type']  ?>">
                    <?php
                    
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    
                    
                    ?>
                </div>
        <?php endif ?>

        <div class="row justify-content-center">


        <?php if(!isset($_GET['login']) && !isset($_GET['welcome'])): ?>
            <form action="" method="post">

                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-success" name="register">Submit</button>
                    <a href="index.php?login">Login</a>

                </div>

            </form>

            <?php 
            elseif(isset($_GET['welcome'])) :
            session_start();
            
            ?>

                <div class="card">
                    <div class="card-header h1">Welcome <?= $_SESSION['username']; ?></div>
                    <form>
                            <input type="submit" class="btn btn-primary" name="logout" value="Logout">
                    </form>
                </div>

            <?php else: ?>
            <form action="" method="post">

                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>

                
                <div class="form-group">
                    <button class="btn btn-success" name="login">Submit</button>
                    <a href="index.php">Register</a>
                </div>

            </form>
            <?php  endif ?>
        </div>
    </div>
</body>
</html>

<?php

//validation
    
    //for create
    create();


   
   //for login
    login();




//registration logic
function create(){
    // CHECK FOR REGISTRATION BUTTON
if(isset($_POST['register'])){
    extract($_REQUEST);

    $db_name = 'database/'.$username.'.json';
    $file = fopen($db_name, 'a');
    
    $user_arr[] = array();

    $form_data = array(
        "username" => test_input($username),
        "email" => test_input($email),
        "password" => password_hash(test_input($password), PASSWORD_DEFAULT),
    );

    
    $user = json_encode($form_data, JSON_PRETTY_PRINT);

    if(fwrite($file, $user)){
        header('location: index.php?login');
    }
    else{
        echo 'something is wrong';
    }
    
    fclose($file);
    
    }
}

// login logic
function login(){
    //login
   if(isset($_POST['login'])){
       extract($_REQUEST);

        

       $get_user = file_get_contents('database/'.$username.'.json');

       $db = json_decode($get_user);

      $user = $db->username;
      $pass = $db->password;

      if(test_input($username) == $user){

         if(password_verify(test_input($password), $pass)){
             session_start();
            //  $_SESSION["loggedin"] = true;
             $_SESSION['username'] = test_input($username);
             $_SESSION['message'] = "Welcome ".$_SESSION['username']."!";
              header('location: index.php?welcome');
            }

        else{ 
                echo "invalid password";
            }
            
        }
        else{
            echo 'incorrect credentials';
        }
    }
}

if(isset($_GET['logout'])){
    
        session_start();

         // Destroy the session.
    if( session_destroy()){
        // Redirect to Signin form
        session_start();

        $_SESSION['message'] = "You have been logged out!";
        $_SESSION['msg_type'] = "info";
        header("location: index.php?home");
        exit;

    }

    }


//input validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }