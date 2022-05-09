<?php
session_start();
?>

<!-- index.php's navigation pane -->
<nav id="navigation" class="navbar navbar-expand-sm navbar-light bg-light static-top py-4">
    <div class="container">
        <ul class="navbar-nav">
            <!-- Home -->
            <li class="nav-item active mr-3">
                <a class="nav-link" href="index.php" id="home">Home
                    <span class="sr-only">(current)</span></a>
            </li>

            <!-- If user is logged in, add Welcome Username! -->
        </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Search form -->
            <form class="form-inline md-form form-sm mt-2 ml-4" method="POST" action="search.php">
                <div class="row">
                    <!-- Magnifying glass search icon -->
                    <div class="col-2 px-0">
                        <i class="fas fa-search" style="color: #9abc79; " aria-hidden="true"></i>
                    </div>

                    <!-- Search bar -->
                    <div class="col-8 px-0">
                        <input name="search" class="form-control form-control-sm " type="text" style="font-style:italic" placeholder="Search for a recipe!" required="required">
                    </div>

                    <!-- Submit button -->
                    <div class="col-2 px-0">
                        <input type="submit" id="submit" value="Submit">
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <!-- Sign Up -->
                <li class="nav-item">
                    <a class="nav-link" href="php/signup.php" id="signup">Sign Up
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <!-- Log In -->
                <li class="nav-item">
                    <a class="nav-link" href="php/login.php" id="login">Log In</a>
                </li>

                <!-- If user is logged in, replace Sign Up/Log In with Profile/Log Out -->
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