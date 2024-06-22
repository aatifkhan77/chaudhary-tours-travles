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
      // The user is not logged in, set the default button HTML
      $button_html = "<a href='registration.html' class='cmn-btn'>GET STARTED</a>";
  }
  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Renten - Car Rental Service HTML Template</title>
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
          <h2 class="page-title">reservation</h2>
          <ol class="page-list">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#0">car list</a></li>
            <li>reservation</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->

  <!-- car-search-section start -->

  
  <section class="car-search-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="car-search-filter-area">
            <div class="car-search-filter-form-area">
              <form class="car-search-filter-form">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="cart-sort-field">
                      <span class="caption">Sort by : </span>
                      <select>
                        <option>Pajero Range</option>
                        <option>Toyota Axio</option>
                        <option>Lancer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-6 d-flex">
                    <input type="text" name="car_search" id="car_search" placeholder="Search what you want........">
                    <button class="search-submit-btn">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="view-style-toggle-area">
              <button class="view-btn list-btn"><i class="fa fa-bars"></i></button>
              <button class="view-btn grid-btn active"><i class="fa fa-th-large"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-70">
      <?php
// Include database connection
include('conn.php');

// Initialize an empty variable for car items HTML
$car_items_html = '';

// Fetch car data from the database
$sql = "SELECT * FROM vehcile";
$result = $conn->query($sql);

// Check if there are any cars
if ($result->num_rows > 0) {
    // Loop through each car and generate HTML
    while ($row = $result->fetch_assoc()) {
      $image_path = str_replace('\\', '/', $row['vehcile_image']);
        $car_items_html .= "
        <div class='col-md-6 col-12'>
          <div class='car-item'>
            <div class='thumb bg_img' data-background='{$image_path}' style='background-repeat: no-repeat; '></div>
            <div class='car-item-body'>
              <div class='content'>
                <h4 class='title'>{$row['vehicle_name']}</h4>
                <span class='price'>Start from {$row['vehcile_rate']} per KM</span>
                <p>{$row['vehicle_description']}</p>
                <a href='#0' class='cmn-btn'>rent car</a>
              </div>
              <div class='car-item-meta'>
                <ul class='details-list'>
                  <li><i class='fa fa-car'></i>{$row['vehicle_model']}</li>
                  <li><i class='fa fa-tachometer'></i>32000 KM</li>
                  <li><i class='fa fa-sliders'></i>{$row['vehicle_transmission']}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>";
    }
} else {
    // If there are no cars
    $car_items_html = "<p>No cars found</p>";
}

// Close database connection
$conn->close();
?>

        <div class="col-lg-8">
          <div class="car-search-result-area grid--view row mb-none-30">
            <!-- car-item end -->
            
 
             <?php echo $car_items_html; ?>
          </div>
          <nav class="d-pagination" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-4">
          <aside class="sidebar">
            <div class="widget widget-reservation">
              <h4 class="widget-title">reservation</h4>
              <div class="widget-body">
                <form class="car-search-form" action="booking.php" method="post">
                  <div class="row">
                    <div class="col-lg-12 form-group">
                    <select name="car_type">
                    <option value="1" selected>Choose Your Car Type</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="HatchBack">HatchBack</option>
                    <option value="Traveller">Traveller</option>
                    <option value="Luxury Car">Luxury Car</option>
                  </select>
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Pickup Location" name="pickup_location">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-map-marker"></i>
                      <input class="form-control has-icon" type="text" placeholder="Drop Off Location" name="drop_location">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Pickup Date" name="pickup_date">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" name="pickup_time">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-calendar"></i>
                      <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Drop Off Date" name="drop_date">
                    </div>
                    <div class="form-group col-md-12">
                      <i class="fa fa-clock-o"></i>
                      <input type="text" class="form-control has-icon timepicker" placeholder="Drop Off Time" name="drop_time">
                    </div>
                  </div>
                  <button type="submit" class="cmn-btn">Reservation</button>
                </form>
              </div>
            </div><!-- widget end -->
            <div class="widget widget-price-filter">
              <h4 class="widget-title">price filter</h4>
              <div class="widget-body">
                <div id="slider-range"></div>
                <div class="filter-price-result">
                  <input type="text" id="amount" readonly><span>(Per Day)</span>
                </div>
              </div>
            </div><!-- widget end -->
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
            </div><!-- widget end -->
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- car-search-section end -->

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