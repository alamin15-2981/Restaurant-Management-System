<?php
session_start();
if(!isset($_SESSION['admin_email'])){
  header("location:index.php");
}

#customer data 
require_once("php/database.php");
$selectQuery = "select * from customer_review";
$selectRunQuery = mysqli_query($connect,$selectQuery);
$counter = mysqli_num_rows($selectRunQuery);
if($counter == 0){
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
    <link rel="stylesheet" href="css/admin.css">
  </head>
  <body>


  <?php require_once("admin_navigation.php") ?>

        <!-- Customer data show start -->
        <div id="customer-data" class="my-5">
        <h1 class="text-center">Review</h1>
        <div class="table-responsive my-3">
          <table class="table table-hover table-borderless table-striped text-center">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Message</th>
                <th>LocalDateTime</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $increment = 1;
                while($data = mysqli_fetch_assoc($selectRunQuery)){ ?>
                  <tr>
                    <td><?php echo $increment;$increment++; ?></td>
                    <td><?php echo $data['message']; ?></td>
                    <td><?php echo $data['localDateTime']; ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger" href="php/reviewDataDelete.php?id=<?php echo $data['id'] ?>">Remove</a>
                    </td>
                  </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- ./Customer data show end -->


    <!-- bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>