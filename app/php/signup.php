<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>

    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom External CSS -->
    <link rel="stylesheet" href="../css/signup.css">

    <!-- Custom External JavaScript -->
    <script src=""></script>
</head>

<body>
    <!-- Constant Navigation Pane Placeholder -->
    <div id="nav_placeholder"></div>

    <form id="signup_form" action="../database/registration.php" method="POST">
        <div class='signup_form'>
            <div class='header justify-content-center'>
                <h2>Sign Up</h2>
            </div>

            <!-- Username -->
            <div class='form-group row'>
                <label for="username" class="col-sm-3 col-form-label">Username</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter a username" required="required">
                </div>
            </div>

            <!-- Email Address -->
            <div class='form-group row'>
                <label for="email" class="col-sm-3 col-form-label">Email Address</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter a valid email address" required="required">
                </div>
            </div>

            <!-- Password -->
            <div class='form-group row'>
                <label for="password" class="col-sm-3 col-form-label">Password</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" required="required">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class='form-group row'>
                <label for="cfm_password" class="col-sm-3 col-form-label">Confirm Password</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="cfm_password" name="cfm_password" placeholder="Confirm your password" required="required">
                </div>
            </div>

            <!-- Submit Sign Up -->
            <div class='form-group row'>
                <div class="col-sm-9 offset-sm-3">
                    <p>
                        <label class="checkbox-inline" for="tnc">
                            <input class="form-check-input" type="checkbox" value="" name="tnc" id="tnc">
                            I accept the <a href="../html/t&c.html" id="tnc_box">Terms of Use & Conditions</a>
                        </label>
                    </p>
                    <input type="submit" class="btn btn-primary btn-lg" name="signup_btn" id="signup_btn">
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

    <!-- Custom internal Javascript -->
    <script>
        $(function() {
            $("#nav_placeholder").load("navigation/signup_navi.php");
        });

        $(document).ready(function() {
            $('#signup_form').submit(function(e) {
                var username = $('#username').val();
                var email_address = $('#email_address').val();
                var password = $('#password').val();
                var cfm_password = $('#cfm_password').val();

                $(".error").remove();

                var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var validEmail = regEx.test(email_address);
                if (!validEmail) {
                    $('#email_address').after('<span class="error"><i>Enter a valid email!</i></span>');
                    e.preventDefault();
                }

                if (password.length < 8) {
                    $('#password').after('<span class="error"><i>Password must be at least 8 characters long!</i></span>');
                    e.preventDefault();
                }

                if (password != cfm_password) {
                    $('#cfm_password').after('<span class="error"><i>Passwords do not match!</i></span>');
                    e.preventDefault();
                }

                if ($('#tnc').not(':checked').length) {
                    $('#tnc_box').after('<span class="error"><i><br> By signing up, you must accept our terms and conditions!</i></span>');
                    e.preventDefault();
                }

            });

        });
    </script>
</body>

</html>