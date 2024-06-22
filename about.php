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
          <h2 class="page-title">about company</h2>
          <ol class="page-list">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li>About us</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- inner-apge-banner end -->

  <!-- features-section start -->
  <section class="features-section pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="car-search-area car-search-area--style2">
            <h3 class="title">Rent your car</h3>
            <form class="car-search-form" action="booking.php" method="post">
              <div class="row">
                <div class="col-xl-12 form-group">
                  <select name="car_type">
                    <option value="1" selected="">Choose Your Car Type</option>
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
                  <input class="form-control has-icon" type="text" placeholder="Pickup Location" name="pickup_location">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-map-marker"></i>
                  <input class="form-control has-icon" type="text" placeholder="Drop Off Location" name="drop_location">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                  <i class="fa fa-calendar"></i>
                  <input type="text" class="form-control has-icon datepicker-here" data-language="en" placeholder="Pickup Date" name="pickup_date">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-clock-o"></i>
                  <input type="text"  class="form-control has-icon timepicker" placeholder="Pickup Time" name="pickup_time" name="timepicker">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                  <i class="fa fa-calendar"></i>
                  <input type="text" class="form-control has-icon datepicker-here" data-language="en" placeholder="Drop Off Date" name="drop_date">
                </div>
                <div class="form-group col-xl-6">
                  <i class="fa fa-clock-o"></i>
                  <input type="text"  class="form-control has-icon timepicker" placeholder="Drop Off Time" name="drop_time" name="timepicker">
                </div>
              </div>
              <button type="submit" class="cmn-btn">Book Now</button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="feature-content">
            <h2 class="title title--border">our awesome features</h2>
            <p>Explore the world hassle-free with our user-friendly website, offering seamless car booking for your every journey.</p>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="feature-item">
                <div class="feature-item-header">
                  <i class="fa fa-user"></i>
                  <h5 class="title">expert drivers</h5>
                </div>
                <div class="feature-item-body">
                  <p>"Expert drivers, unforgettable rides. Choose us for seamless journeys every time."</p>
                </div>
              </div>
            </div><!-- feature-item end -->
            <div class="col-sm-6">
              <div class="feature-item">
                <div class="feature-item-header">
                  <i class="fa fa-user"></i>
                  <h5 class="title">24 hours suport</h5>
                </div>
                <div class="feature-item-body">
                  <p>Get assistance round the clock. Our team is here to ensure your travel plans go smoothly, any time, any day. </p>
                </div>
              </div>
            </div><!-- feature-item end -->
            <div class="col-sm-6">
              <div class="feature-item">
                <div class="feature-item-header">
                  <i class="fa fa-user"></i>
                  <h5 class="title">free registration</h5>
                </div>
                <div class="feature-item-body">
                  <p>Sign up for free and unlock a world of travel possibilities. No hidden fees, just pure convenience.</p>
                </div>
              </div>
            </div><!-- feature-item end -->
            <div class="col-sm-6">
              <div class="feature-item">
                <div class="feature-item-header">
                  <i class="fa fa-user"></i>
                  <h5 class="title">low rent cost</h5>
                </div>
                <div class="feature-item-body">
                  <p>Travel affordably without compromising on quality. Enjoy competitive rates and make the most of your budget. </p>
                </div>
              </div>
            </div><!-- feature-item end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- features-section end -->

  <!-- call-action-section start -->
  <section class="call-action-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="call-action-img text-lg-left text-center">
            <img src="assets/images/elements/call-action-personj.png" alt="image">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="call-cation-content">
            <h3 class="top-title">Call Us  for Suport</h3>
            <span class="call-number">+91 9891671848</span>
            <p>Reach out to our dedicated support team for assistance with any inquiries or concerns you may have regarding your travel experience.</p>
            <a href="contact.html" class="cmn-btn">contact us</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- call-action-section end -->

  <!-- choose-car-section start -->
  <section class="choose-car-section section-bg pt-120 pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="choose-car-slider-two owl-carousel">
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
        $car_items_html .= "
        <div class='car-item border-none'>
            <div class='thumb'>
                <img src='{$row['vehcile_image']}' alt='image'>
                <a href='#0' class='cmn-btn'>reservation now</a>
            </div>
            <div class='content px-0 pb-0'>
                <h4 class='title'>{$row['vehicle_name']}</h4>
                <span class='price'>{$row['vehcile_rate']} per KM</span>
                <div class='review-starts'>";
        
        // Calculate the number of stars based on the rating
        $rating = $row['vehicle_rating'];
        $full_stars = intval($rating);
        $half_star = ($rating - $full_stars) >= 0.5 ? 1 : 0;
        $empty_stars = 5 - $full_stars - $half_star;
        
        // Add full stars
        for ($i = 0; $i < $full_stars; $i++) {
            $car_items_html .= "<a href='#0'><i class='fa fa-star'></i></a>";
        }
        
        // Add half star if applicable
        if ($half_star) {
            $car_items_html .= "<a href='#0'><i class='fa fa-star-half-empty'></i></a>";
        }
        
        // Add empty stars
        for ($i = 0; $i < $empty_stars; $i++) {
            $car_items_html .= "<a href='#0'><i class='fa fa-star-o'></i></a>";
        }
        
        $car_items_html .= "
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
<?php echo $car_items_html; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- choose-car-section end -->

  <!-- company-char-section start -->
  <section class="company-char-section pt-120 pb-120">
    <div class="container">
      <div class="row mb-50">
        <div class="col-lg-6">
          <div class="company-char-content">
            <h2 class="title title--border text-capitalize">our company charateristics</h2>
            <p>Welcome to Chaudhary Tours & Travels! We are dedicated to providing exceptional travel experiences tailored to your needs. Whether you're planning a family vacation, a business trip, or a weekend getaway, our team of experienced professionals is here to ensure a smooth and enjoyable journey.  </p>
            <blockquote>
              <p>"Discover the world with Chaudhary Tours & Travels – where every journey is a masterpiece, every moment a memory, and every destination a dream fulfilled."</p>
            </blockquote>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="company-char-thumb">
            <img src="assets\images\carback.jpg" alt="image">
            <a href="assets\car_video.mp4" data-rel="lightcase:myCollection" class="yt-icon"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
      <div class="row mb-none-30">
        <div class="col-lg-4 col-sm-6">
          <div class="text-item">
            <h3 class="title">We are Seen Form 2010</h3>
            <p>Chaudhary Tours & Travels has been proudly serving travelers since 2010. With over a decade of experience, we turn every journey into a memorable adventure. Trust us for exceptional travel experiences.</p>
          </div>
        </div><!-- text-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="text-item">
            <h3 class="title">Provided Best Services</h3>
            <p>Chaudhary Tours & Travels has been providing the best services since 2010. With a commitment to excellence, we ensure every journey is unforgettable. Trust us for all your travel needs.</p>
          </div>
        </div><!-- text-item end -->
        <div class="col-lg-4 col-sm-6">
          <div class="text-item">
            <h3 class="title">Our Mission</h3>
            <p>Our mission at Chaudhary Tours & Travels is to create exceptional travel experiences that exceed our customers' expectations. We strive to provide personalized service, unparalleled convenience, and unforgettable journeys. </p>
          </div>
        </div><!-- text-item end -->
      </div>
    </div>
  </section>
  <!-- company-char-section end -->

  <!-- team-section start -->
  <!-- <section class="team-section pb-120">
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
        <!-- </div> -->
        <!-- team-item end -->
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

  <!-- consulting-section start -->
  <section class="consulting-section pb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row mb-none-30">
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src="assets/images/brand-logo/1.png" alt="image">
                </div>
              </div>
            </div><!-- brand-item end -->
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src="assets/images/brand-logo/2.png" alt="image">
                </div>
              </div>
            </div><!-- brand-item end -->
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src="assets/images/brand-logo/3.png" alt="image">
                </div>
              </div>
            </div><!-- brand-item end -->
            <div class="col-sm-6">
              <div class="brand-item">
                <div class="brand-item--inner">
                  <img src="assets/images/brand-logo/4.png" alt="image">
                </div>
              </div>
            </div><!-- brand-item end -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="consulting-from-area">
            <h2 class="title">Request a Free Consultation</h2>
            <form class="consulting-form" action="consultation.php" method="POST">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" name="cons_f_name" id="cons_f_name" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="cons_l_name" id="cons_l_name" placeholder="Last Name">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="email" name="cons_email" id="cons_email" placeholder="Email Address">
                </div>
                <div class="form-group col-md-6">
                  <input type="tel" name="cons_phone" id="cons_phone" placeholder="Phone">
                </div>
              </div>
              <div class="form-group">
                <textarea placeholder="Message"></textarea>
              </div>
              <button type="submit" class="cmn-btn">submit now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- consulting-section end -->

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