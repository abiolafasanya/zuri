<?php 
require_once 'layouts/header.php'; 
$logged_in = false; 
require_once 'layouts/nav.php'; 

?>


<div class="container">
        <div style="margin-bottom:100px;"></div>

        <?php require_once 'extra/messages.php' ?>
        <h3 class="text-center alert alert-light">Login and registration</h3>
        <div class="row justify-content-center border-secondary rounded border m-auto p-lg-5 m-lg-auto">
            <div class="col-md-6 p-5">
                <!-- //login -->
                <form action="process.php" method="post">
                    <h5 class="text-center">Login</h5>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-grouop">
                            <button class="btn btn-primary" name="login">Login</button>
                            Forgot password?<a href="reset_pwd.php?reset=">Reset now</a>
                        </div>
                    </form>
                    <hr>
            </div>
            <div class="col-md-6 p-5" style="background-color: #e7e8ec;">
               <!-- // registration -->
                <form action="process.php" method="post">
                    <h5 class="text-center">Registration</h5>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" minlength="3">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-grouop">
                            <button class="btn btn-primary" name="register" minlength="8">Register</button>
                        </div>
                    </form>
                    <hr>
            </div>
        </div>
    </div>

<?php require_once 'layouts/footer.php'; ?>
