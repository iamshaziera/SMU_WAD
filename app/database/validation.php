<?php
session_start();

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "user_registration");

$username = $_POST["username"]; 
$password = $_POST["password"];

$validate = " select * from user_table where username = '$username' && pass = '$password'";
$result = mysqli_query($con, $validate);
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION["username"] = $username;

    echo '<script>  
    window.alert("Logged in successfully! Redirecting to homepage...");
    window.location.href = "../index.php";
    </script>';
}

else{
    echo '<script>  
    window.alert("Invalid login credentials, please try again!");
    window.location.href = "../php/login.php";
    </script>';
}
    

?>

