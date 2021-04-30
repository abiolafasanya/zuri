<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="./dashboard.php">
                Harbiola {Zuri Task 2}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    <?php if($logged_in == true) : ?>
                       
                      <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?add_course">Add Courses</a>
                      </li>

                      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?= $_SESSION['username']; ?>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="course.php?logout">
                                        Logout
                                    </a>
                                    <a class="dropdown-item" href="reset_pwd.php?create_pwd=<?= $session_id ?>">
                                        Reset Password
                                    </a>
                                </div>
                            </li>
                    <?php else:   ?>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>


