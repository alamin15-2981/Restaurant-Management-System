<?php
require_once("database.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $photo = $_FILES['file'];
    $old_file = $_REQUEST['old_file'];
    $phone = $_REQUEST['phone'];
    $date = $_REQUEST['date'];
    $message = $_REQUEST['message'];

    $photoName = $photo['name'];
    $tmp_name = $photo['tmp_name'];


    if($name!='' and $old_file != '' and $phone != '' and $date != '' and $message != ''){

        if ($photoName != '') {
            $photoName = uniqid()."_".$photoName;
            $updateQuery = "update customer_login set name='$name',photo='$photoName',phone='$phone',birthDate='$date',message='$message' where id = '$id'";
            $runQuery = mysqli_query($connect, $updateQuery);
        } else {
            $updateQuery = "update customer_login set name='$name',photo='$old_file',phone='$phone',birthDate='$date',message='$message' where id = '$id'";
            $runQuery = mysqli_query($connect, $updateQuery);
        }


        if ($runQuery) {
            move_uploaded_file($tmp_name,"../uploads/$photoName");
            header("location:../profile.php");
        }

    }else{
        header("location:../profile.php");
    }
}


