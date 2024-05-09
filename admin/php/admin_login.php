<?php
#login page backend
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if($email != '' and $password != ''){
        #admin email or password
        $admin_email = "admin@gmail.com";
        $admin_password = "admin";

        if($admin_email === $email and $admin_password === $password){
            $_SESSION['admin_email'] = $email;
            header("location:../home.php");
        }else{
            header("location:../index.php?not_match");
        }
    }else{
        header("location:../index.php?empty_field");
    }
}