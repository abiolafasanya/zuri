<?php
    if(isset($_GET['emptyfields'])){
       echo '<div class="container text-center alert alert-danger">
            Please input all fields correctly
        </div>';
    }

    if(isset($_GET['worng_credentials'])){
       echo '<div class="container text-center alert alert-danger">
            Wrong Username or password please check and try again
        </div>';
    }
    if(isset($_GET['added_course'])){
       echo '<div class="container alert alert-success">
            Course has been added
        </div>';
    }
    if(isset($_GET['add_failed'])){
       echo '<div class="container alert alert-danger">
            Failed to add course try again later
        </div>';
    }
    if(isset($_GET['success_registration'])){
       echo '<div class="container  alert alert-success">
            Registration Successful. You can log in now
        </div>';
    }
?>

