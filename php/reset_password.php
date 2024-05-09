<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if($email != '' and $password != ''){
        $selectQuery = "select * from customer_login where email = '$email'";
        $selectRunQuery = mysqli_query($connect,$selectQuery);

        $password = password_hash($password,PASSWORD_BCRYPT);

        if(mysqli_num_rows($selectRunQuery) > 0){
            $updateQuery = "update customer_login set password='$password' where email = '$email'";
            $runQuery = mysqli_query($connect,$updateQuery);
            header("location:../reset_pwd.php?password_update_success");
        }else {
            header("location:../reset_pwd.php?not_match");
        }
    }else{
        header("location:../reset_pwd.php?empty_field");
    }
}