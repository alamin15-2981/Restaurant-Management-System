<?php
require_once("database.php");
$id = $_REQUEST['id'];

$deleteQuery = "delete from customer_review where id = '$id'";
$runQuery = mysqli_query($connect,$deleteQuery);

if($runQuery){
    header("location:../reviewData.php");
}