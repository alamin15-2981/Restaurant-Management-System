<?php
session_start();
require_once("php/database.php");
if (!isset($_SESSION['customer_email'])) {
  header("location:index.php");
}

# review
$selectQuery = "select customer_login.name,customer_login.photo,customer_review.message from customer_login inner join customer_review on customer_login.id = customer_review.customer_key";
$selectRunQuery = mysqli_query($connect, $selectQuery);

$singleQuery = "select * from customer_login";
$singleRunQuery = mysqli_query($connect,$singleQuery);

if(mysqli_num_rows($singleRunQuery) == 0){
  session_unset();
}


# menu item
$menuSelectQuery = "select * from admin_menu";
$menuRunQuery = mysqli_query($connect, $menuSelectQuery);

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

<body>


  <!-- Navigation part start -->
  <div id="navigation">
    <div class="left-side-nav">
      <img src="images/logo.png" alt="logo pic">
    </div>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="#menu-section">Our Menu</a></li>
      <li><a href="#reservation-section">Reservation</a></li>
      <li><a href="#contact-section">Contact Us</a></li>
    </ul>
  </div>
  <!-- ./Navigation part end -->



  <!-- Slide section start -->
  <section id="slide-section" class="text-light d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-1">Delicious Food Village</h1>
    <h2 class="display-3 text-info">Bangladeshi Foods</h2>
    <p class="w-50 my-3 text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis repellat ipsam, laudantium rerum libero, harum quo velit esse doloremque iure sit laborum rem eligendi deserunt dolorem? Iure iusto aut quas?</p>
    <a href="#reservation-section" class="btn btn-danger">Order Now</a>
  </section>
  <!-- ./Slide section end -->


  <!-- Menu section start -->
  <?php
  if (mysqli_num_rows($menuRunQuery) > 0) { ?>
    <section id="menu-section">
      <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row my-5">
          <div class="text-center mb-5">
            <h3 class="text-danger">Discover</h3>
            <h1>Our Menu</h1>
          </div>
          <?php
          while ($data = mysqli_fetch_assoc($menuRunQuery)) { ?>
            <div class="col-md-4">
              <div class="menu-item d-flex">
                <div class="menu-left-part w-25">
                  <img src="admin/uploads/<?php echo $data['photo'] ?>" style="width: 250px;height: 100px;object-fit: cover;" class="img-fluid rounded img-thumbnail" alt="images">
                </div>
                <div class="menu-right-part w-75 p-2">
                  <h1><?php echo $data['name'] ?></h1>
                  <h4><?php echo $data['price'] ?><sub style="color: red;">tk/=</sub></h4>
                  <p class="text-justify"><?php echo $data['message'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php  } ?>

  <!-- ./Menu section end -->


  <!-- Reservation section start -->
  <section id="reservation-section">
    <div class="container-fluid bg-dark text-light py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="text-center mb-5">
          <h3 class="text-danger">Make A</h3>
          <h1>Reservation</h1>
        </div>
        <div class="col-md-5">
          <div class="reservation-form p-3 rounded shadow-sm">
            <form action="php/customer_reservation.php" method="post">
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-user"></i>&nbsp;&nbsp;Name
                </label>
                <input class="form-control" type="text" name="name" placeholder="Name">
              </div>
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email
                </label>
                <input class="form-control" type="email" name="email" placeholder="Email">
              </div>
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-address-book"></i>&nbsp;&nbsp;Phone
                </label>
                <input class="form-control" type="number" name="phone" placeholder="Phone">
              </div>
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-person"></i>&nbsp;&nbsp;Select Members
                </label>
                <select name="members" class="form-control" id="">
                  <option selected disabled>How Many?</option>
                  <option value="1">1 people</option>
                  <option value="2">2 people</option>
                  <option value="3">3 people</option>
                  <option value="4">4 people</option>
                  <option value="5">5 people</option>
                  <option value="6">6 people</option>
                  <option value="7">7 people</option>
                  <option value="8">8 people</option>
                  <option value="9">9 people</option>
                  <option value="10">10 people</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Date
                </label>
                <input class="form-control" type="date" name="date" placeholder="Date">
              </div>
              <div class="mb-4">
                <label for="" class="form-label">
                  <i class="fa-solid fa-message"></i>&nbsp;&nbsp;Message
                </label>
                <textarea class="form-control" name="message" id="" cols="40" rows="6" placeholder="Your Messsage"></textarea>
              </div>
              <div class="mb-4">
                <input class="btn btn-success" type="submit" value="Make Reservation">
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <img src="images/openingHours.png" alt="photo" class="img-fluid rounded img-thumbnail w-75">
        </div>
      </div>
    </div>
  </section>
  <!-- ./Reservation section end -->




  <!-- Review Section start -->
  <?php
  if (mysqli_num_rows($selectRunQuery) > 0) { ?>
    <section id="review-section">
      <div class="container-fluid my-5">
        <div class="row d-flex justify-content-center">
          <div class="text-center mb-5">
            <h3 class="text-danger">Testimonials</h3>
            <h1>What Customers Say</h1>
          </div>
          <?php
          while ($data = mysqli_fetch_assoc($selectRunQuery)) { ?>
            <div class="col-md-3 shadow p-3 my-2 mx-2">
              <div class="review-content">
                <p><?php echo $data['message']; ?></p>
                <img src="uploads/<?php echo $data['photo']; ?>" alt="photo" class="img-fluid img-thumbnail shadow">
                <span class="text-center h4">~<?php echo $data['name']; ?></span>
              </div>
            </div>
          <?php  } ?>
        </div>
      </div>
    </section>
  <?php  } ?>
  <!-- ./Review Section end -->


  <!-- Contact Section start -->
  <div id="contact-section">
    <div class="container-fluid bg-dark text-light py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="text-center mb-5">
          <h3 class="text-danger">Get In Touch</h3>
          <h1>Contact Us</h1>
        </div>
        <div class="col-md-5">
          <div class="contact-form">
            <form action="php/customer_contact.php" method="post">
              <div class="mb-3">
                <label class="form-label" for="">
                  <i class="fa-solid fa-user"></i>&nbsp;&nbsp;Name
                </label>
                <input class="form-control" type="text" name="name" placeholder="Name">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">
                  <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Email
                </label>
                <input class="form-control" type="email" name="email" placeholder="Email">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">
                  <i class="fa-solid fa-message-pen"></i>&nbsp;&nbsp;Subject
                </label>
                <input class="form-control" type="text" name="subject" placeholder="Subject">
              </div>
              <div class="mb-3">
                <label class="form-label" for="">
                  <i class="fa-solid fa-message"></i>&nbsp;&nbsp;About Me
                </label>
                <textarea class="form-control" name="message" cols="40" rows="7" style="resize: none;" placeholder="About Me"></textarea>
              </div>
              <div class="mb-2">
                <input type="submit" class="btn btn-success mb-3" value="Send Message">
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5 p-3 d-flex justify-content-center align-items-center">
          <iframe class="rounded img-thumbnail" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14593.580836438028!2d90.31154702962858!3d23.875600652443183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c23dd12bbc75%3A0x313d214552eabe56!2sDaffodil%20Smart%20City!5e0!3m2!1sen!2sbd!4v1669559368764!5m2!1sen!2sbd" width="500" style="border:0;height: 560px !important;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- ./Contact Section end -->


  <?php
  if (isset($_REQUEST['empty_field'])) :
    require_once("exceptions/empty_field.php");
  endif;
  if (isset($_REQUEST['reservation_success'])) :
    include("exceptions/reservation_success.php");
  endif;
  if (isset($_REQUEST['reservation_failed'])) :
    include("exceptions/reservation_failed.php");
  endif;
  if (isset($_REQUEST['message_success'])) :
    include("exceptions/message_success.php");
  endif;
  if (isset($_REQUEST['message_failed'])) :
    include("exceptions/message_failed.php");
  endif;
  ?>



  <!-- bootstrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- js -->
  <script>
    const closeBtn = () => {
      let errorContainer = document.getElementById("error-container")
      console.log(errorContainer.setAttribute("style", "display: none!important;"))

      window.location.href = "http://localhost/RMS/home.php"
    }
  </script>
</body>

</html>