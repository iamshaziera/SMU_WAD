<?php
session_start();

$con = mysqli_connect("localhost", "root", ""); //localhost, username, password
mysqli_select_db($con, "user_registration");

$username = $_POST["username"]; 
$email_address = $_POST["email_address"]; 
$password = $_POST["password"];

$check_email = " select * from user_table where email_address = '$email_address' ";
$result = mysqli_query($con, $check_email);
$num = mysqli_num_rows($result);

if($num == 1){
    echo '<script>  
     window.alert("Email already in use, please try again!"); 
     window.location.href = "../php/signup.php";
     </script>';
}

else{
    $check_username = " select * from user_table where username = '$username' ";
    $result = mysqli_query($con, $check_username);
    $num = mysqli_num_rows($result);
    if($num == 1){
        echo '<script>  
        window.alert("Username already taken, please try again!"); 
        window.location.href = "../php/signup.php";
        </script>';
    }

    else{
        $reg = " insert into user_table(username, email_address, pass) values ('$username', '$email_address', '$password') ";
        mysqli_query($con, $reg);

        echo '<script>  
        window.alert("Registration successful!"); 
        window.location.href = "../php/signup.php";
        </script>';
    }
}
