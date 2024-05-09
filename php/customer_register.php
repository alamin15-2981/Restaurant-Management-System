<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $photo = $_FILES['file'];
    $phone = $_REQUEST['phone'];
    $date = $_REQUEST['date'];
    $message = $_REQUEST['message'];

    $photoName = $photo['name'];
    $tmp_name = $photo['tmp_name'];

    if($name!='' and $email !='' and $password!='' and $photoName and $tmp_name != '' and $phone != '' and $date != '' and $message != ''){
        try {
            $photoName = uniqid()."_".$photoName;
            $password = password_hash($password,PASSWORD_BCRYPT);
            $insertQuery = "insert into customer_login(name,email,password,photo,phone,birthDate,message) values ('$name','$email','$password','$photoName','$phone','$date','$message')";

            $selectQuery = "select * from customer_login where email = '$email'";
            $selectRunQuery = mysqli_query($connect,$selectQuery);

            if(mysqli_num_rows($selectRunQuery) === 0){
                $runQuery = mysqli_query($connect,$insertQuery);
                if($runQuery){
                    move_uploaded_file($tmp_name,"../uploads/$photoName");
                    header("location:../register.php?reg_success");
                }
            }else{
                header("location:../register.php?use_another_gmail");
            }
        }catch(Exception $err){
            echo $err->getMessage();
        }
    }else{
        header("location:../register.php?empty_field");
    }
}