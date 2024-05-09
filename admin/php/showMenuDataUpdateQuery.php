<?php
require_once("database.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $photo = $_FILES['file'];
    $old_file = $_REQUEST['old_file'];
    $price = $_REQUEST['number'];
    $message = $_REQUEST['message'];

    $photoName = $photo['name'];
    $tmp_name = $photo['tmp_name'];

    if ($name != '' and $old_file != '' and $price != '' and $message != '') {
        if ($photoName != '') {
            $photoName = uniqid() . "_" . $photoName;
            $updateQuery = "update admin_menu set name='$name',photo='$photoName',price='$price',message='$message' where id = '$id'";
            $runQuery = mysqli_query($connect, $updateQuery);
        } else {
            $updateQuery = "update admin_menu set name='$name',photo='$old_file',price='$price',message='$message' where id = '$id'";
            $runQuery = mysqli_query($connect, $updateQuery);
        }


        if ($runQuery) {
            move_uploaded_file($tmp_name, "../uploads/$photoName");
            header("location:../showMenuData.php");
        }
    } else {
        header("location:../showMenuData.php");
    }
}
