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

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../php/signup.php" id="signup">Sign Up
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../php/login.php" id="login">Log In</a>
            </li>

            <!-- Once logged in, profile and log out will appear -->
            <?php
            if (isset($_SESSION["username"])) {
                echo "
                <script>
                    document.getElementById('signup').innerText = 'Profile';
                    document.getElementById('signup').id = 'profile';
                    document.getElementById('profile').setAttribute('href', '../php/profile.php');

                    document.getElementById('login').innerText = 'Log Out';
                    document.getElementById('login').id = 'logout';
                    document.getElementById('logout').setAttribute('href', '../php/logout.php');
                </script>
                ";
            }
            ?>
        </ul>
        </div>
    </div>
</nav>