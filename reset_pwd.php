<?php 
    session_start();
    if(isset($_SESSION['admin_email'])){
        header("location:home.php");
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
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>


    <!-- Login page design start -->
        <section id="login-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 shadow shadow-sm rounded rounded-3 p-4 abs-center bg-dark text-light">
                        <h1 class="display-5 text-center mb-4">Reset Password</h1>
                        <form action="php/reset_password.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="">
                                    <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email
                                </label>
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">
                                    <i class="fa-solid fa-lock"></i>&nbsp;&nbsp;New Password
                                </label>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="mb-2 text-center">
                                <input type="submit" value="Update Password" class="btn btn-success mb-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- ./Login page design end -->
    <a href="index.php" class="btn btn-success top-btn-pos">Login</a>


    <?php 
        if(isset($_REQUEST['empty_field'])):
            require_once("exceptions/empty_field.php");
        endif;
        if(isset($_REQUEST['not_match'])):
            include("exceptions/not_match.php");
        endif;
        if(isset($_REQUEST['password_update_success'])):
            include("exceptions/password_update_success.php");
        endif;
    ?>


    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- js --> 
    <script>
        const closeBtn = ()=>{
            let errorContainer = document.getElementById("error-container")
            console.log(errorContainer.setAttribute("style","display: none!important;"))

            window.location.href="http://localhost/RMS/reset_pwd.php"
        }
    </script>
  </body>
</html>