<?php
session_start();
if(!isset($_SESSION['admin_email'])){
  header("location:index.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>Restaurant Management System</title>
    <!-- favicon --> 
    <link rel="shortcut icon" href="images/restaurant.png" type="image/x-icon">
    <!-- bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome css --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body style="width: 100%;height: 100vh;overflow: hidden;">


  <?php require_once("admin_navigation.php") ?>


  <!-- Admin home page start -->
  <div id="admin-home-section" class="d-flex justify-content-center align-items-center">
  <h1 class="text-light display-1">Admin Panel</h1>
  </div>
  <!-- ./Admin home page end -->
  


    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>