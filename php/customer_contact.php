<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];


    if($name!='' and $email !='' and $subject and $message != ''){
        $insertQuery = "insert into customer_contact(name,email,subject,message) values ('$name','$email','$subject','$message')";
        $runQuery = mysqli_query($connect,$insertQuery);

        if($runQuery){
            header("location:../home.php?message_success");
        }else{
            header("location:../home.php?message_failed");
        }
    }else{
        header("location:../home.php?empty_field");
    }
}