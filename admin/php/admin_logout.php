<?php
session_start();

if(isset($_SESSION['admin_email'])){
    session_unset();
    header("location:../index.php");
}else {
    header("location:../index.php");
}