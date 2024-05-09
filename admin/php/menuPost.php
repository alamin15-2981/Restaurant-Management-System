<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $photo = $_FILES['file'];
    $price = $_REQUEST['number'];
    $message = $_REQUEST['message'];

    $photoName = $photo['name'];
    $tmp_name = $photo['tmp_name'];


    if($name!='' and $photoName != '' and $price != '' and $message != ''){
        $photoName = uniqid()."_".$photoName;
        $insertQuery = "insert into admin_menu(name,photo,price,message)values('$name','$photoName','$price','$message')";
        $runQuery = mysqli_query($connect,$insertQuery);

        if($runQuery){
            move_uploaded_file($tmp_name,"../uploads/$photoName");
            header("location:../menuPost.php?success");
        }else{
            header("location:../menuPost.php?failed");
        }
    }else{
        header("location:../menuPost.php?empty_field");
    }
}