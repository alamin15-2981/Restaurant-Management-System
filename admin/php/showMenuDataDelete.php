<?php
require_once("database.php");
$id = $_REQUEST['id'];

$deleteQuery = "delete from admin_menu where id = '$id'";
$runQuery = mysqli_query($connect,$deleteQuery);

if($runQuery){
    header("location:../showMenuData.php");
}