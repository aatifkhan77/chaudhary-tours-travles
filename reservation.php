<!DOCTYPE html>
<html lang="en">

<?php
session_start();

// Initialize an empty variable for the button HTML
$button_html = "";

// Check if the user is logged in
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
    // The user is logged in, get the username
    $username = $_SESSION["user_username"];
    // Update the button HTML with the username and a logout button
    $button_html = "<a href='#' class='cmn-btn'>$username</a>
    <span style='margin-right: 10px;'></span>
                    <a href='logout.php' class='cmn-btn'>Logout</a>";
    
                  
} else {
    
    $button_html = "<a href='registration.html' class='cmn-btn'>GET STARTED</a>";
   
   
}
?>
<?php
// Include database connection
include('conn.php');

// Initialize an empty variable for booking details HTML
$booking_details_html = '';

// Fetch booking data from the database for the logged-in user
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
  // The user is logged in, get the full name
  $fullname = $_SESSION["user_username"];
  
  // Prepare the SQL query to fetch booking data for the given full name
  $sql = "SELECT * FROM booking WHERE fullname = '$fullname'";
  $result = $conn->query($sql);
  
  // Check if there are any bookings
  if ($result->num_rows > 0) {
      // Loop through each booking and generate HTML
      while ($row = $result->fetch_assoc()) {
          $booking_details_html .= "
          <div class='row'>
              <div class='col'>
                  <div class='card'>
                      <div class='card-header'>
                          Booking " . $row['booking_id'] . "
                      </div>
                      <div class='card-body'>
                          <p>Car Type: " . $row['car_type'] . "</p>
                          <p>Pickup Location: " . $row['pickup_location'] . "</p>
                          <p>Drop Off Location: " . $row['drop_location'] . "</p>
                          <p>Pickup Date and Time: " . $row['pickup_date'] . " " . $row['pickup_time'] . "</p>
                          <p>Drop Off Date and Time: " . $row['drop_date'] . " " . $row['drop_time'] . "</p>
                          <p>Status: " . $row['status'] . "</p>";

          // Show cancel button only if the status is 'Pending'
          if ($row['status'] === 'Pending') {
              $booking_details_html .= "
                          <form method='POST' action='cancel_booking.php'>
                              <input type='hidden' name='booking_id' value='" . $row['booking_id'] . "'>
                              <button type='submit' class='btn btn-danger'>Cancel Booking</button>
                          </form>";
          } else {
              // Show print receipt button if status is 'Cancelled' or 'Completed'
              $booking_details_html .= "
                          <form method='POST' action='print_receipt.php' target='_blank'>
                              <input type='hidden' name='booking_id' value='" . $row['booking_id'] . "'>
                              <button type='submit' class='btn btn-success'>Print Receipt</button>
                          </form>";
          }

          $booking_details_html .= "
                      </div>
                  </div>
              </div>
          </div>";
      }
  } else {
      // If there are no bookings for the logged-in user
      $booking_details_html .= "
      <div class='row'>
          <div class='col'>
              <div class='card'>
                  <div class='card-header'>
                      Your Bookings
                  </div>
                  <div class='card-body'>
                      <p>No bookings found !!!!</p>
                  </div>
              </div>
          </div>
      </div>";
  }
} else {
  // If the user is not logged in
  $booking_details_html .= "
  <div class='row'>
      <div class='col'>
          <div class='card'>
              <div class='card-body'>
                  <p>Log in to view your bookings.</p>
              </div>
          </div>
      </div>
  </div>";
}

// Close database connection
$conn->close();
?>





<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chaudhary Tours & Travels</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpg"/>
  <!-- fontawesome css link -->
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <!-- bootstrap css link -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- lightcase css link -->
  <link rel="stylesheet" href="assets/css/lightcase.css">
  <!-- animate css link -->
  <link rel="stylesheet" href="assets/css/animate.css">
  <!-- nice select css link -->
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <!-- datepicker css link -->
  <link rel="stylesheet" href="assets/css/datepicker.min.css">
  <!-- wickedpicker css link -->
  <link rel="stylesheet" href="assets/css/wickedpicker.min.css">
  <!-- jquery ui css link -->
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
  <!-- owl carousel css link -->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <!-- main style css link -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

  <!-- preloader start -->
  <div id="preloader"></div>
  <!-- preloader end -->   

   <!--  header-section start  -->
   <header class="header-section header-section--style2">
    <div class="header-bottom">
      <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
          <a class="site-logo site-title" href="index.php"><img src="assets/images/logo7.png" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu m-auto">
              <li ><a href="index.php">Home</a>
                <!-- <ul class="sub-menu">
                  <li><a href="index.php">Home One</a></li>
                  <li><a href="home-two.html">Home Two</a></li>
                </ul> -->
              </li>
              <li><a href="about.php">About</a>
              <li ><a href="car-list-one.php">cars</a>  <!--class="menu_has_children"-->
                <!-- <ul class="sub-menu">
                  <li><a href="car-list-one.php">car list one</a></li>
                  <li><a href="car-list-two.html">car list two</a></li>
                </ul> -->
              </li>
              <li><a href="reservation.php">Book</a>
                <!-- <ul class="sub-menu">
                  <li><a href="reservation.php">reservation</a></li>
                  <li><a href="login.html">login</a></li>
                  <li><a href="registration.html">registration</a></li>
                  <li><a href="error-404.html">404</a></li>
                </ul> -->
              </li>
              <li class="menu_has_children"><a href="#0">Registration</a>
                <ul class="sub-menu">
                  <li><a href="login.html">login</a></li>
                  <li><a href="registration.html">registration</a></li>
                </ul>
              </li>
              <li><a href="contact.html">contact us</a></li>
            </ul>
            <!-- <div class="header-action d-flex align-items-center justify-content-between">
              <div class="lag-select-area">
                <select>
                  <option>ENG</option>
                  <option>RUS</option>
                  <option>BAN</option>
                </select>
              </div> -->
              <!-- <a href="registration.html" class="cmn-btn">GET STARTED</a> -->
              <?php echo $button_html; ?>
            </div>
          </div>
        </nav>
      </div>
    </div><!-- header-bottom end -->
  </header>
  <!--  header-section end  -->


  <!-- inner-apge-banner start -->
  <section class="inner-page-banner bg_img overlay-3" data-background="assets/images/inner-page-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="page-title">Booking Details</h2>
          <ol class="page-list">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#0">car list</a></li>
            <li>Booking Details</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card {
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
      margin-top:10px;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      background-color: #da1c36;
      color: #fff;
      font-weight: bold;
    }

    .card-body p {
      margin-bottom: 10px;
    }
  </style>
<div class="container">
  <?php echo $booking_details_html; ?>
</div>



  <!-- reservation-section start -->
  <!-- <section class="reservation-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="reservation-details-area">
            <div class="thumb">
              <img src="assets/images/cars/b1.jpg" alt="images">
            </div>
            <div class="content">
              <div class="content-block">
                <h3 class="car-name">forester subar</h3>
                <span class="price">Start form $20 per day</span>
                <p>Lorem ipsum dolor sit amet, urna sit sociis lacus sem turpis magna, montes euismod eros nu dignsim etiam elementum sed tellus sed. Sollicitudin occaecati ut bibendum vitae vehicula adipiscing, partent justo labore, maecenas at aliquam eum. Eleifend suspendisse enim integer, ipsum mauris curabitur nulla ut sit, pede aenean, lacus sed. Dignissim wisi turpis pharetra sapien.</p>
              </div>
              <form class="reservation-form">
                <div class="content-block">
                  <h3 class="title">extra benifit and fee</h3>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">television   $05 per day</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">childen seat</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                        <label class="form-check-label" for="exampleCheck3">backfast & lunch $20 per day</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4">
                        <label class="form-check-label" for="exampleCheck4">car insurances</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck5">
                        <label class="form-check-label" for="exampleCheck5">air-condition $35 per day</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck6">
                        <label class="form-check-label" for="exampleCheck6">security & safety</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Pickup Location">
                    </div>
                    <div class="form-group col-md-6">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Drop Off Location">
                    </div>
                    <div class="form-group col-md-6">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Pickup Date">
                    </div>
                    <div class="form-group col-md-6">
                      <i class="fa fa-clock-o"></i>
                      <input type="text" name="timepicker" class="form-control has-icon timepicker" placeholder="Pickup Time">
                    </div>
                    <div class="form-group col-md-6">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Drop Off Date">
                    </div>
                    <div class="form-group col-md-6">
                      <i class="fa fa-clock-o"></i>
                      <input type="text" name="timepicker" class="form-control has-icon timepicker" placeholder="Drop Off Time">
                    </div>
                  </div>
                </div>
                <div class="content-block">
                  <h3 class="title">personal information</h3>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <input type="text" placeholder="Name">
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="email" placeholder="Email Address">
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="tel" placeholder="Phone">
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="text" placeholder="City">
                    </div>
                    <div class="col-lg-6 form-group">
                      <input type="text" placeholder="Zip Code">
                    </div>
                    <div class="col-lg-6 form-group">
                      <select>
                        <option>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="content-block">
                  <h3 class="title">payment method</h3>
                  <div class="row">
                    <div class="col-lg-6 form-group">
                      <select>
                        <option>Select Payment Methos</option>
                        <option>Paypal</option>
                        <option>Payoneer</option>
                        <option>Visa Card</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="content-block">
                  <h3 class="title">addisonal information</h3>
                  <div class="row">
                    <div class="col-lg-12 form-group">
                      <textarea placeholder="Write addisonal information in here"></textarea>
                    </div>
                    <div class="col-lg-12">
                      <button type="reset" class="cmn-btn bg-black">Cancel</button>
                      <button type="submit" class="cmn-btn">reservation</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-lg-4">
          <aside class="sidebar">
            <div class="widget widget-all-cars">
              <h4 class="widget-title">our all cars</h4>
              <ul class="cars-list">
                <li><a href="#0">mistubisshi</a></li>
                <li><a href="#0">forester subar</a></li>
                <li><a href="#0">subary liberty</a></li>
                <li><a href="#0">pajero range</a></li>
                <li><a href="#0">volkswagen</a></li>
              </ul>
            </div>
            <div class="widget widget-testimonial">
              <h4 class="widget-title">testimonial</h4>
              <div class="widget-body">
                <div class="testimonial-slider owl-carousel">
                  <div class="testimonial-item">
                    <div class="testimonial-item--header">
                      <div class="thumb"><img src="assets/images/testimonial/1.jpg" alt="image"></div>
                      <div class="content">
                        <h6 class="name">martin hook</h6>
                        <span class="designation">business man</span>
                      </div>
                    </div>
                    <div class="testimonial-item--body">
                      <p>Tristique consequat, lorem sed vivamus donec eget, nulla pharetra lacinia wisi diamaliquam velit nec.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> widget end -->
          <!-- </aside> -->
        <!-- </div> -->
      <!-- </div> -->
    <!-- </div> -->
  <!-- </section>  -->
  <!-- reservation-section end -->
  <!-- footer-section start -->
  <footer class="footer-section">
    <div class="footer-top pt-120 pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-about">
              <div class="widget-about-content">
                <a href="index.php" class="footer-logo"><img src="assets/images/logo7.png" alt="logo"></a>
                <p>
                  "Embark on a journey of a lifetime with Chaudhary Tours and Travels,From breathtaking destinations to personalized itineraries, our commitment to excellence ensures unforgettable experiences tailored just for you. Trust in our expertise, indulge in luxury, and let us guide you to the world's wonders, one adventure at a time."

                </p>
                <ul class="social-links">
                  <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                  <!-- <li><a href="#0"><i class="fa fa-twitter"></i></a></li> -->
                  <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title">our cars</h4>
              <ul>
                <li><a href="#0">Innova Crysta</a></li>
                <li><a href="#0">Toyota Fortuner</a></li>
                <li><a href="#0">Swift Dzire</a></li>
                <li><a href="#0">Ertiga</a></li>
                <li><a href="#0">Hyundai Xcent</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4">
            <div class="footer-widget widget-menu">
              <h4 class="widget-title">useful link</h4>
              <ul>
                <li><a href="about.php">about</a></li>
                <li><a href="reservation.php">Booking</a></li>
                <li><a href="contact.html">contact</a></li>
                <li><a href="registration.html">Login</a></li>
                <li><a href="car-list-one.php">car list</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-sm-8">
            <div class="footer-widget widget-address">
              <h4 class="widget-title">contact with us</h4>
              <ul>
                <li>
                  <i class="fa fa-map-marker"></i>
                  <span>New Friends Colony , New Delhi</span>
                </li>
                <li>
                  <i class="fa fa-envelope"></i>
                  <span>www.chaudharytourstravels@gmail.com</span>
                </li>
                <li>
                  <i class="fa fa-phone-square"></i>
                  <span>+91 9891671848 , +91 8076281875</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-sm-6">
            <p class="copy-right-text"><a href="index.php">Chaudhary Tours & Travels</a></p>
          </div>
          <div class="col-sm-6">
            <ul class="payment-method d-flex justify-content-end">
              <li>We accept</li>
              <li><img src="assets/images/money-method/1.png" alt="image"></li>
              <li><img src="assets/images/money-method/2.png" alt="image"></li>
              <li><img src="assets/images/money-method/3.png" alt="image"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-section end -->
  
  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <!-- jquery js link -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- jquery migrate js link -->
  <script src="assets/js/jquery-migrate-3.0.0.js"></script>
  <!-- bootstrap js link -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- lightcase js link -->
  <script src="assets/js/lightcase.js"></script>
  <!-- wow js link -->
  <script src="assets/js/wow.min.js"></script>
  <!-- nice select js link -->
  <script src="assets/js/jquery.nice-select.min.js"></script>
  <!-- datepicker js link -->
  <script src="assets/js/datepicker.min.js"></script>
  <script src="assets/js/datepicker.en.js"></script>
  <!-- wickedpicker js link -->
  <script src="assets/js/wickedpicker.min.js"></script>
  <!-- owl carousel js link -->
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- jquery ui js link -->
  <script src="assets/js/jquery-ui.min.js"></script>
  <!-- main js link -->
  <script src="assets/js/main.js"></script>
</body>

</html>