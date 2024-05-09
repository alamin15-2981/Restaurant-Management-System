<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $members = $_REQUEST['members'];
    $date = $_REQUEST['date'];
    $message = $_REQUEST['message'];


    if($name!='' and $email !='' and $phone != '' and $members != '' and $date != '' and $message != ''){
        $insertQuery = "insert into reservation(name,email,phone,members,date,message) values ('$name','$email','$phone','$members','$date','$message')";
        $runQuery = mysqli_query($connect,$insertQuery);

        if($runQuery){
            header("location:../home.php?reservation_success");
        }else{
            header("location:../home.php?reservation_failed");
        }
    }else{
        header("location:../home.php?empty_field");
    }
}