<?php
if(!isset($_SESSION))
{
    session_start();
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(empty($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in to view this pages content";
    header("location:login.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    header("location:login.php");
}
?>
