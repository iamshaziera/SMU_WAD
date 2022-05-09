<?php
session_start();
?>

<nav id="navigation" class="navbar navbar-expand-sm navbar-light bg-light static-top py-4">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active mr-3">
                <a class="nav-link" href="../index.php" id="home">Home
                    <span class="sr-only">(current)</span></a>
            </li>

        </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <form class="form-inline md-form form-sm mt-2 ml-4" method="POST" action="../search.php">
                <div class="row">
                    <div class="col-2 px-0">
                        <i class="fas fa-search" style="color: #9abc79; " aria-hidden="true"></i>
                    </div>

                    <div class="col-8 px-0">
                        <input class="form-control form-control-sm " type="text" style="font-style:italic" placeholder="Search for a recipe!" aria-label="Search">
                    </div>

                    <div class="col-2 px-0">
                        <input type="submit" id="submit" value="Submit">
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php" id="signup">Sign Up
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php" id="login">Log In</a>
                </li>

                <!-- Once logged in, profile and log out will appear -->
                <?php
                if (isset($_SESSION["username"])) {
                    echo "
                    <script>
                        document.getElementById('signup').innerText = 'Profile';
                        document.getElementById('signup').id = 'profile';
                        document.getElementById('profile').setAttribute('href', 'php/profile.php');

                        document.getElementById('login').innerText = 'Log Out';
                        document.getElementById('login').id = 'logout';
                        document.getElementById('logout').setAttribute('href', 'php/logout.php');
                    </script>
                    ";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>