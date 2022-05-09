<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Log In</title>

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- Custom External JavaScript -->
    <script src=""></script>
</head>

<body>
    <!-- Constant Navigation Pane Placeholder -->
    <div id="nav_placeholder"></div>

    <form id="login_form" action="../database/validation.php" method="POST">
        <div class='login_form'>
            <div class='header justify-content-center'>
                <h2>Log In</h2>
            </div>

            <!-- Username -->
            <div class='form-group row'>
                <label for="email" class="col-sm-3 col-form-label">Username</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
                        required="required">
                </div>
            </div>

            <!-- Password -->
            <div class='form-group row'>
                <label for="password" class="col-sm-3 col-form-label">Password</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                        required="required">
                </div>
            </div>

            <!-- Submit Log In -->
            <div class='form-group row'>
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary btn-lg" name="login">Log In</button>
                </div>
            </div>
        </div>
    </form>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script>
        $(function() {
            $("#nav_placeholder").load("navigation/login_navi.php");
        });
    </script>

</body>
</html>