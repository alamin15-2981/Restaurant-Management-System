<?php
session_start();
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if($email != '' and $password != ''){
        $selectQuery = "select * from customer_login where email = '$email'";
        $selectRunQuery = mysqli_query($connect,$selectQuery);
        $data = mysqli_fetch_assoc($selectRunQuery);

        $db_Email = $data['email'];
        $db_Pwd = $data['password'];

        if(password_verify($password,$db_Pwd)){
            $_SESSION['customer_email'] = $email;
            header("location:../home.php");
        }else {
            header("location:../index.php?not_match");
        }
    }else{
        header("location:../index.php?empty_field");
    }
}