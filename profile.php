<?php 
    session_start();
    require_once("php/database.php");
    if(!isset($_SESSION['customer_email'])){
        header("location:index.php");
    }

    $email = $_SESSION['customer_email'];
    $selectQuery = "select * from customer_login where email = '$email'";
    $selectRunQuery = mysqli_query($connect,$selectQuery);

    if(mysqli_num_rows($selectRunQuery) == 0){
        session_unset();
    }

    $data = mysqli_fetch_assoc($selectRunQuery);
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
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>


    <!-- Navigation part start -->
    <div id="navigation">
        <div class="left-side-nav">
            <img src="images/logo.png" alt="logo pic">
        </div>
        <ul class="nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="php/updateProfileForm.php?id=<?php echo $data['id'] ?>">Edit Profile</a></li>
            <li><a href="php/customer_logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- ./Navigation part end -->


    <!-- Profile top -->
    <section id="profile-top-section">
        <img src="images/cover-bg.png" alt="photo" class="img-fluid cover-pic">
        <img src="uploads/<?php echo $data['photo'] ?>" alt="photo" class="img-fluid img-thumbnail profile-pic">
    </section>
    <!-- ./Profile top end -->



    <!-- User data show Start -->
    <section id="user-data" class="mt-5">
        <div class="container-fluid">
            <div class="row d-flex flex-column justif-content-center align-items-center">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table style="margin: 0 auto;" class="table table-bordered table-striped tabe-hover text-center">
                            <tr class="bg-dark">
                                <th colspan="2" class="text-light">Your Profile Information</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $data['name']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><?php echo $data['password']; ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?php echo $data['phone']; ?></td>
                            </tr>
                            <tr>
                                <th>BirthDate</th>
                                <td><?php echo $data['birthDate']; ?></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td><?php echo $data['message']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./User data show End -->




    <!-- Review Section start -->
    <div id="review-section" class="my-5">
        <div class="container-fluid">
            <div class="row d-flex flex-column justif-content-center align-items-center">
            <div class="text-center mb-5">
                <h1>Review Form</h1>
            </div>
                <div class="col-md-5">
                    <div class="review-form">
                        <form action="php/customer_review.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="">
                                    <i class="fa-solid fa-message"></i>&nbsp;&nbsp;Message
                                </label>
                                <textarea class="form-control" name="message" cols="40" rows="7" style="resize: none;" placeholder="Review For Restaurant"></textarea>
                            </div>
                            <input type="hidden" name="customer_id" value="<?php echo $data['id']; ?>">
                            <div class="mb-2">
                                <input type="submit" class="btn btn-success mb-3" value="Review">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Review Section end -->





    <?php
    if (isset($_REQUEST['empty_field'])) :
        require_once("exceptions/empty_field.php");
    endif;
    if (isset($_REQUEST['review_success'])) :
        include("exceptions/review_success.php");
    endif;
    if (isset($_REQUEST['review_failed'])) :
        include("exceptions/review_failed.php");
    endif;
    ?>



    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- js -->
    <script>
        const closeBtn = () => {
            let errorContainer = document.getElementById("error-container")
            console.log(errorContainer.setAttribute("style", "display: none!important;"))

            window.location.href = "http://localhost/RMS/profile.php"
        }
    </script>
</body>

</html>