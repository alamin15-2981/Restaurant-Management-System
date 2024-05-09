<?php
require_once("database.php");

$id = $_REQUEST['id'];
$selectQuery = "select * from admin_menu where id = '$id'";
$selectRunQuery = mysqli_query($connect, $selectQuery);

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
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>


    <!-- position-absolute top-50 start-50 -->

    <!-- Login page design start -->
    <section id="login-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 shadow shadow-sm rounded rounded-3 p-4 abs-center bg-dark text-light form-over">
                    <h1 class="display-5 text-center mb-4">Update Menu</h1>
                    <form action="showMenuDataUpdateQuery.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="">
                                <i class="fa-solid fa-user"></i>&nbsp;&nbsp;Name
                            </label>
                            <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $data['name'] ?>">
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">
                                <i class="fa-solid fa-image"></i>&nbsp;&nbsp;Photo
                            </label>
                            <input class="form-control" type="file" accept="image/*" name="file">
                            <input type="hidden" name="old_file" value="<?php echo $data['photo'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">
                                <i class="fa-solid fa-address-book"></i>&nbsp;&nbsp;Price
                            </label>
                            <input placeholder="Price" class="form-control" type="number" name="number" value="<?php echo $data['price'] ?>">>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">
                                <i class="fa-solid fa-message"></i>&nbsp;&nbsp;About Menu Item
                            </label>
                            <textarea class="form-control" name="message" cols="40" rows="7" style="resize: none;" placeholder="About Menu Item"><?php echo $data['message'] ?></textarea>
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" class="btn btn-success mb-3" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Login page design end -->
    <a href="../showMenuData.php" class="btn btn-success top-btn-pos">Back</a>




    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>