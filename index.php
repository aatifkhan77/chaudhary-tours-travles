<!DOCTYPE html>
<html lang="en">
<!-- 
// session_start();
CodeCampBD2023

// Check if the user is logged in
// if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
    // The user is logged in, display the username
//     echo "Welcome, ".$_SESSION["user_username"]."!";
// } else {
    // The user is not logged in, redirect to the login page
//     header("Location: login.html");
//     exit();
// }
 -->

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

<!-- Place the updated button HTML wherever you want it to appear -->


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
 
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>


</head>
<body>

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

  <!-- banner-section start  -->
  <section class="banner-section banner-section--style2 bg_img" data-background="assets/images/banner.jpg">
    <div class="banner-el-img"><img src="assets\images\logocar.png" alt="image"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="car-search-area mt-0">
            <h3 class="title">Book Your Car Now</h3>
            <form class="car-search-form" action="booking.php" method="post">
              <div class="row">
                <div class="col-xl-12 form-group">
                  <select name="car_type">
                    <option value="1" selected>Choose Your Car Type</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="HatchBack">HatchBack</option>
                    <option value="Traveller">Traveller</option>
                    <option value="Luxury Car">Luxury Car</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                  <i class="fa fa-map-marker"></i>
                  <input class="form-control has-icon" type="text" placeholder="Pickup Location" name="pickup_location" id="pickup_location" onFocus="geolocate()">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-map-marker"></i>
                  <input class="form-control has-icon" type="text" placeholder="Drop Off Location"  name="drop_location" id="drop_location" onFocus="geolocate()">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                  <i class="fa fa-calendar"></i>
                  <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Pickup Date" name="pickup_date">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-clock-o"></i>
                  <input type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" name="pickup_time">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                  <i class="fa fa-calendar"></i>
                  <input type='text' class='form-control has-icon datepicker-here' data-language='en' placeholder="Drop Off Date" name="drop_date">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-clock-o"></i>
                  <input type="text"  class="form-control has-icon timepicker" placeholder="Drop Off Time" name="drop_time">
                </div>
              </div>
              <button type="submit" class="cmn-btn btn-radius">Book Now</button>
            </form>
          </div>
        </div>

        

        <div class="col-lg-6">
          <div class="banner-content">
            <h1 class="title">Chaudhary Tours & Travels</h1>
            <p>"Embark on unforgettable journeys with us, where every road leads to
              adventure and every destination becomes a story."</p>
            <a href="#0" class="cmn-btn">See all vehicles</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-section end  -->

  <!-- about-section start -->
  <section class="about-section pt-120 pb-120">
    <div class="element text-center"><img src="assets/images/elements/car2.png" alt="image"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="block-area">
            <div class="block-header">
              <h2 class="title">We are Best Tours & Travels Company</h2>
              <p>
                "Discover unparalleled journeys with the best in the business. At our Chaudhary Tours & Travels, we turn dreams into destinations with expert planning, personalized service, and a passion for exploration."
              </p>
            </div>
            <div class="block-body">
              <ul class="cmn-list">
                <li>Fair Pricing</li>
                <li>Expert Drivers</li>
                <li>Diverse Flee</li>
                <li>Seamless Booking</li>
                <li>Customized Experiences</li>
                <li>Customer Satisfaction </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about-section end -->

  <!-- counter-section start -->
  <div class="counter-section bg_img overlay-main" data-background="assets/images/bg1.jpg">
    <div class="container">
      <div class="row mb-none-30">
        <div class="col-lg-3 col-sm-6">
          <div class="counter-item counter-item--style2">
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <div class="content">
              <span class="counter">50+</span>
              <span class="title">total car</span>
            </div>
          </div>
        </div><!-- counter-item end -->
        <div class="col-lg-3 col-sm-6">
          <div class="counter-item counter-item--style2">
            <div class="icon">
              <i class="fa fa-smile-o"></i>
            </div>
            <div class="content">
              <span class="counter">10000+</span>
              <span class="title">happy customer</span>
            </div>
          </div>
        </div><!-- counter-item end -->
        <div class="col-lg-3 col-sm-6">
          <div class="counter-item counter-item--style2">
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <div class="content">
              <span class="counter">20M +</span>
              <span class="title">travel time</span>
            </div>
          </div>
        </div><!-- counter-item end -->
        <div class="col-lg-3 col-sm-6">
          <div class="counter-item counter-item--style2">
            <div class="icon">
              <i class="fa fa-puzzle-piece"></i>
            </div>
            <div class="content">
              <span class="counter">9443</span>
              <span class="title">solution</span>
            </div>
          </div>
        </div><!-- counter-item end -->
      </div>
    </div>
  </div>
  <!-- counter-section end -->
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
        // Convert backslashes to forward slashes for image path
        $image_path = str_replace('\\', '/', $row['vehcile_image']);
        
        $car_items_html .= "
        <div class='col-lg-6'>
          <div class='car-item car-item--style2'>
            <div class='thumb bg_img' data-background='{$image_path}' style='background-repeat: no-repeat; '></div>
            <div class='car-item-body'>
              <div class='content'>
                <h4 class='title'>{$row['vehicle_name']}</h4>
                <span class='price'>Start from {$row['vehcile_rate']} per KM</span>
                <p>{$row['vehicle_description']}</p>
                <a href='#0' class='cmn-btn'>Rent Car</a>
              </div>
              <div class='car-item-meta'>
                <ul class='details-list'>
                  <li><i class='fa fa-car'></i>Model {$row['vehicle_model']}</li>
                  <li><i class='fa fa-tachometer'></i>Transmission: {$row['vehicle_transmission']}</li>
                </ul>
              </div>
            </div>
          </div><!-- car-item end -->
        </div><!-- car-item end -->";
    }
} else {
    // If there are no cars
    $car_items_html = "<p>No cars found</p>";
}

// Close database connection
$conn->close();
?>

  
  <!-- choose-car-section start -->
   <!-- choose-car-section start -->
   <section class="choose-car-section pt-120 pb-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">our awesome car in here</h2>
            <p> 
              "Welcome to a world where luxury meets adventure. Our fleet boasts the finest selection of top-tier vehicles, meticulously maintained and ready to elevate your journey. Experience the epitome of style, comfort, and performance as you embark on unforgettable rides with our awesome cars."
            </p>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
      <?php echo $car_items_html; ?>
    </div>
  </section>

    


  <!-- choose-car-section end -->

  <!-- combine-section start -->
  <!-- <section class="combine-section section-bg">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-lg-6 bg_img overlay-3 history-area" data-background="assets/images/bg2.jpg">
          <div class="history-wrapper">
            <h2 class="title">Our great <span>Achievements</span></h2>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <div class="history-item">
                  <span class="year">1952 - 1955</span>
                  <h4 class="title">start our journey</h4>
                  <p>Pellentesque bibendum. Vebfelis cubilia orci. Congue faub feugiat </p>
                </div> -->
              </div><!-- history-item end -->
              <!-- <div class="col-lg-6 col-sm-6">
                <div class="history-item">
                  <span class="year">1952 - 1955</span>
                  <h4 class="title">start our journey</h4>
                  <p>Pellentesque bibendum. Vebfelis cubilia orci. Congue faub feugiat </p>
                </div> -->
              </div><!-- history-item end -->
              <!-- <div class="col-lg-6 col-sm-6">
                <div class="history-item">
                  <span class="year">1952 - 1955</span>
                  <h4 class="title">start our journey</h4>
                  <p>Pellentesque bibendum. Vebfelis cubilia orci. Congue faub feugiat </p>
                </div> -->
              </div><!-- history-item end -->
              <!-- <div class="col-lg-6 col-sm-6">
                <div class="history-item">
                  <span class="year">1952 - 1955</span>
                  <h4 class="title">start our journey</h4>
                  <p>Pellentesque bibendum. Vebfelis cubilia orci. Congue faub feugiat </p>
                </div> -->
              <!-- </div> -->
              <!-- history-item end -->
            <!-- </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="testimonial-slider owl-carousel">
            <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src="assets/images/testimonial/1.jpg" alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div> -->
            <!-- </div> -->
            <!-- testimonial-item end -->
            <!-- <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src="assets/images/testimonial/1.jpg" alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div> -->
            <!-- </div> -->
            <!-- testimonial-item end -->
            <!-- <div class="testimonial-item text-center">
              <div class="testimonial-item--header">
                <div class="thumb"><img src="assets/images/testimonial/1.jpg" alt="image"></div>
                <h3 class="name">martin hook</h3>
                <span class="designation">business man</span>
              </div>
              <div class="testimonial-item--body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
              </div> -->
            <!-- </div> -->
            <!-- testimonial-item end -->
          <!-- </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- combine-section end -->

  <!-- choose-us-section start -->
  <section class="choose-us-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="choose-us-content">
            <h2 class="title title--border text-capitalize">Why choose our company</h2>
            <div class="choose-us-area">
              <div class="choose-us-item">
                <div class="thumb bg_img" data-background="assets/images/choose-us/1.jpg"></div>
                <div class="content">
                  <h4 class="title">expert drivers</h4>
                  <p>
                    "Expert drivers, unforgettable rides. Choose us for seamless journeys every time."
                  </p>
                </div>
              </div><!-- choose-us-item end -->
              <div class="choose-us-item">
                <div class="thumb bg_img" data-background="assets/images/cars/7.jpg"></div>
                <div class="content">
                  <h4 class="title">fast services</h4>
                  <p>
                    "Swift solutions, seamless experiences. Choose us for fast and expert services, every ride."
                  </p>
                </div>
              </div><!-- choose-us-item end -->
              <div class="choose-us-item">
                <div class="thumb bg_img" data-background="assets/images/choose-us/3.jpg"></div>
                <div class="content">
                  <h4 class="title">customer support</h4>
                  <p>
                    "Reliable assistance, round-the-clock. Count on our exceptional customer support for prompt solutions and peace of mind, every mile."
                  </p>
                </div>
              </div><!-- choose-us-item end -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="request-quote-area">
            <div class="request-quote-header">
              <h3 class="title">request for quote</h3>
            </div>
            <div class="request-quote-body">
              <form class="request-quote-form" method="post" action="quotation.php">
                <div class="form-group">
                  <input type="text" name="rq_name" id="rq_name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="email" name="rq_email" id="rq_email" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="text" name="rq_email_title" id="rq_email_title" placeholder="Title">
                </div>
                <div class="form-group">
                  <textarea placeholder="Write Message" name="rq_message" ></textarea>
                </div>
                <button type="submit" class="cmn-btn">send request</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- choose-us-section end -->

  <!-- subscribe-section start -->
  <!-- <section class="subscribe-section overlay-main bg_img pt-120 pb-120" data-background="assets/images/bg1.jpg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="subscribe-content-area text-center">
            <h2 class="title text-white">Subscribe Our News Latters for Get Update </h2>
            <form class="subscribe-form">
              <input type="email" name="subs_email" id="subs_email" placeholder="Enter your email address">
              <button type="submit" class="form-icon"><i class="fa fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- subscribe-section end -->

  <!-- team-section start -->
  <!-- <section class="team-section pt-120 pb-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">expert support team</h2>
            <p> Augue urna molestie mi adipiscing vulputate pede sedmassa  Praesquam massa, sodales velit turpis in tellu.</p>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
        <div class="col-lg-3 col-sm-6">
          <div class="team-item team-item--style2">
            <div class="thumb">
              <img src="assets/images/team/4.jpg" alt="image">
            </div>
            <div class="content">
              <h5 class="name">martin hook</h5>
              <span class="designation">support manager</span>
              <ul class="details-list">
                <li><a href="mailto:www.support/martin.com">www.support/martin.com</a></li>
                <li><a href="tel:+088-222-5555-4444">+088-222-5555-4444</a></li>
                <li>
                  <a href="#0"><i class="fa fa-facebook-f"></i></a>
                  <a href="#0"><i class="fa fa-linkedin"></i></a>
                  <a href="#0"><i class="fa fa-twitter"></i></a>
                  <a href="#0"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div> -->
        </div><!-- team-item end -->
        <!-- <div class="col-lg-3 col-sm-6">
          <div class="team-item team-item--style2">
            <div class="thumb">
              <img src="assets/images/team/5.jpg" alt="image">
            </div>
            <div class="content">
              <h5 class="name">luthar king</h5>
              <span class="designation">luthar king</span>
              <ul class="details-list">
                <li><a href="mailto:www.support/luthar.com">www.support/luthar.com</a></li>
                <li><a href="tel:+088-222-5555-4444">+088-222-5555-4444</a></li>
                <li>
                  <a href="#0"><i class="fa fa-facebook-f"></i></a>
                  <a href="#0"><i class="fa fa-linkedin"></i></a>
                  <a href="#0"><i class="fa fa-twitter"></i></a>
                  <a href="#0"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- team-item end -->
        <!-- <div class="col-lg-3 col-sm-6">
          <div class="team-item team-item--style2">
            <div class="thumb">
              <img src="assets/images/team/6.jpg" alt="image">
            </div>
            <div class="content">
              <h5 class="name">harbrt tony</h5>
              <span class="designation">support manager</span>
              <ul class="details-list">
                <li><a href="mailto:www.support/harbrt.com">www.support/harbrt.com</a></li>
                <li><a href="tel:+088-222-5555-4444">+088-222-5555-4444</a></li>
                <li>
                  <a href="#0"><i class="fa fa-facebook-f"></i></a>
                  <a href="#0"><i class="fa fa-linkedin"></i></a>
                  <a href="#0"><i class="fa fa-twitter"></i></a>
                  <a href="#0"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- team-item end -->
        <!-- <div class="col-lg-3 col-sm-6">
          <div class="team-item team-item--style2">
            <div class="thumb">
              <img src="assets/images/team/7.jpg" alt="image">
            </div>
            <div class="content">
              <h5 class="name">tom jekson</h5>
              <span class="designation">support manager</span>
              <ul class="details-list">
                <li><a href="mailto:www.support/jekson.com">www.support/jekson.com</a></li>
                <li><a href="tel:+088-222-5555-4444">+088-222-5555-4444</a></li>
                <li>
                  <a href="#0"><i class="fa fa-facebook-f"></i></a>
                  <a href="#0"><i class="fa fa-linkedin"></i></a>
                  <a href="#0"><i class="fa fa-twitter"></i></a>
                  <a href="#0"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- team-item end -->
      <!-- </div>
    </div>
  </section> -->
  <!-- team-section end -->

  <!-- download-apps-section start -->
  <!-- <section class="download-apps-section pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="apps-content">
            <h2 class="title title--border">Download Mobile Apps for Rental Car</h2>
            <p>Turpis posuere lectus maecenas fusce eget velit. Nibh donec habitaprsent in ut at phasellus dui, tempus lorem, tellus purus justo. Spendisse sr integer aeneanmnas pharetra aliquam sed rutrum nec. Erat sollicitudin at vel ading mi,dolor viverra babd ugshs king lipa nipa. over the head and thinking  to multikon themplate .</p>
            <div class="row">
              <div class="col-lg-6">
                <p>Lorem ipsum dolor sit ametamet justo proin libero ultricipendisse eget vel, vel vulputate ut varius quam cras.</p>
              </div>
              <div class="col-lg-6">
                <p>Lorem ipsum dolor sit amet,mesto proin libero ultriciequam spendisse eget vel vel vulputate ut variuquam cras. viver estas Prarcu.</p>
              </div>
            </div>
            <div class="btn-area">
              <a href="#0"><img src="assets/images/elements/google-btn.png" alt="image"></a>
              <a href="#0"><img src="assets/images/elements/apple-btn.png" alt="image"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="apps-thumb text-center">
            <img src="assets/images/elements/apps-img.png" alt="image">
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- download-apps-section end -->

  <!-- blog-section start -->
  <!-- <section class="blog-section pb-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header text-center">
            <h2 class="section-title">latest news &amp; tips</h2>
            <p> Augue urna molestie mi adipiscing vulputate pede sedmassa  Praesquam massa, sodales velit turpis in tellu.</p>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
        <div class="col-lg-4 col-sm-6">
          <div class="post-item shadow-none">
            <div class="thumb">
              <img src="assets/images/blog/5.jpg" alt="image">
              <a href="#0" class="post-date">16<br>Dec</a>
            </div>
            <div class="content">
              <h3 class="post-title"><a href="#0">Pellentesque turpis  nonum</a></h3>
              <p>Lorem ipsum dolor sit amet, phasellus ut curatur vestibulum sit vitae aenean, morbi quam blandit ad. Quis ac, eu enim pulvinar ante nam sepurus ut metus ligula imperdiet orci nibh.</p>
              <a href="#0" class="border-btn">read more</a>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- post-item end -->
        <!-- <div class="col-lg-4 col-sm-6">
          <div class="post-item shadow-none">
            <div class="thumb">
              <img src="assets/images/blog/6.jpg" alt="image">
              <a href="#0" class="post-date">16<br>Dec</a>
            </div>
            <div class="content">
              <h3 class="post-title"><a href="#0">Quis gravida ultrices nam</a></h3>
              <p>Lorem ipsum dolor sit amet, phasellus ut curatur vestibulum sit vitae aenean, morbi quam blandit ad. Quis ac, eu enim pulvinar ante nam sepurus ut metus ligula imperdiet orci nibh.</p>
              <a href="#0" class="border-btn">read more</a>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- post-item end -->
        <!-- <div class="col-lg-4 col-sm-6">
          <div class="post-item shadow-none">
            <div class="thumb">
              <img src="assets/images/blog/6.jpg" alt="image">
              <a href="#0" class="post-date">16<br>Dec</a>
            </div>
            <div class="content">
              <h3 class="post-title"><a href="#0">Eleifend ligula velit quisque.</a></h3>
              <p>Lorem ipsum dolor sit amet, phasellus ut curatur vestibulum sit vitae aenean, morbi quam blandit ad. Quis ac, eu enim pulvinar ante nam sepurus ut metus ligula imperdiet orci nibh.</p>
              <a href="#0" class="border-btn">read more</a>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- post-item end -->
      <!-- </div>
    </div>
  </section> -->
  <!-- blog-section end -->

  <!-- brand-section start -->
  <!-- <div class="brand-section pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="brand-slider owl-carousel">
            <div class="brand-item">
              <div class="brand-item--inner">
                <img src="assets/images/brand-logo/5.png" alt="image">
              </div>
            </div> -->
            <!-- brand-item end -->
            <!-- <div class="brand-item">
              <div class="brand-item--inner">
                <img src="assets/images/brand-logo/6.png" alt="image">
              </div>
            </div> -->
            <!-- brand-item end -->
            <!-- <div class="brand-item">
              <div class="brand-item--inner">
                <img src="assets/images/brand-logo/7.png" alt="image">
              </div>
            </div> -->
            <!-- brand-item end -->
            <!-- <div class="brand-item">
              <div class="brand-item--inner">
                <img src="assets/images/brand-logo/5.png" alt="image">
              </div>
            </div> -->
            <!-- brand-item end -->
            <!-- <div class="brand-item">
              <div class="brand-item--inner">
                <img src="assets/images/brand-logo/6.png" alt="image">
              </div> -->
            <!-- </div> -->
            <!-- brand-item end -->
          <!-- </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- brand-section end -->

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
                  <span>+91 9891671848 </span>
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