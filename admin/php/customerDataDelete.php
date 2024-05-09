<?php
require_once("database.php");
$id = $_REQUEST['id'];

# join data delete
$selectQuery = "select * from customer_review where customer_key = '$id'";
$selectRunQuery = mysqli_query($connect,$selectQuery);

if(mysqli_fetch_assoc($selectRunQuery) > 0){
    $deleteSelectQuery = "delete from customer_review where customer_key = '$id'";
    mysqli_query($connect,$deleteSelectQuery);
}

$deleteQuery = "delete from customer_login where id = '$id'";
$runQuery = mysqli_query($connect,$deleteQuery);

if($runQuery){
    header("location:../customerData.php");
}