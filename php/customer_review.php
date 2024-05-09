<?php
require_once("database.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $message = $_REQUEST['message'];
    $id = $_REQUEST['customer_id'];

    if($id != '' and $message != ''){
        $insertQuery = "insert into customer_review(message,customer_key)values('$message','$id')";
        $runQuery = mysqli_query($connect,$insertQuery);

        if($runQuery){
            header("location:../profile.php?review_success");
        }else{
            header("location:../profile.php?review_failed");
        }
    }else{
        header("location:../profile.php?empty_field");
    }
}