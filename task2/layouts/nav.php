<nav class="navbar navbar-expand-md bg-primary navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Zuri Task 2</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <?php 
    
    if($logged_in == true) : 
    ?>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?add_course">Add Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="course.php?logout">Logout</a>
      </li>
    </ul>
    <?php else:   ?>

    <?php endif;  ?>
        
  </div>
</nav>


