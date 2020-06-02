<?php require_once('private/initialize.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Grayrids">
  <title>JOMS - Home</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="website_asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="website_asset/css/line-icons.css">
  <link rel="stylesheet" href="website_asset/css/owl.carousel.css">
  <link rel="stylesheet" href="website_asset/css/owl.theme.css">
  <link rel="stylesheet" href="website_asset/css/nivo-lightbox.css">
  <link rel="stylesheet" href="website_asset/css/magnific-popup.css">
  <link rel="stylesheet" href="website_asset/css/animate.css">
  <link rel="stylesheet" href="website_asset/css/color-switcher.css">
  <link rel="stylesheet" href="website_asset/css/menu_sideslide.css">
  <link rel="stylesheet" href="website_asset/css/main.css">
  <link rel="stylesheet" href="website_asset/css/responsive.css">

</head>

<body>
  <!-- Header Section Start -->
  <header id="slider-area">
    <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#slider-area">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#features">About</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link page-scroll" href="#portfolios">Works</a>
              </li>   -->
            <!-- <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing">Pricing</a>
              </li> -->
            <!--  <li class="nav-item">
                <a class="nav-link page-scroll" href="#team">Team</a>
              </li>    
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#subscribe">Subscribe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog">Blog</a>
              </li>  -->
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Carousel Section -->
    <div id="carousel-area">
      <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>
        <style>
          #carousel-area .carousel-item .carousel-caption h2 {
            font-size: 50px;
          }
        </style>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img src="website_asset/img/slider/banner1.jpg" alt="">
            <div class="carousel-caption text-center">
              <h3 class="wow fadeInRight" data-wow-delay="0.2s">The New Automated</h1>
                <h2 class="wow fadeInRight" data-wow-delay="0.4s" style="font-size:20px !important;">Judicial Operation Management Systems</h2>
                <h4 class="wow fadeInRight" data-wow-delay="0.6s">Providing a faster Judicial Process.</h4>
                <!-- <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Download</a> -->
                <!-- <a href="#" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Get Started!</a> -->
            </div>
          </div>
          <div class="carousel-item">
            <img src="website_asset/img/slider/banner2.jpg" alt="">
            <div class="carousel-caption text-center">
              <h3 class="wow fadeInDown" data-wow-delay="0.3s">Automated</h3>
              <h2 class="wow bounceIn" data-wow-delay="0.6s">Application for Affidavit</h2>
              <h4 class="wow fadeInUp" data-wow-delay="0.9s">Easy, Simple and Faster.</h4>
              <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInUp" data-wow-delay="1.2s">Apply Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="website_asset/img/slider/banner3.jpg" alt="">
            <div class="carousel-caption text-center">
              <h3 class="wow fadeInDown" data-wow-delay="0.3s">Ready For</h3>
              <h2 class="wow fadeInRight" data-wow-delay="0.6s">Online Case Submission</h2>
              <h4 class="wow fadeInUp" data-wow-delay="0.6s">File, Review and Upload Cases.</h4>
              <a href="#" class="btn btn-lg btn-border wow fadeInUp" data-wow-delay="0.9s">File Case</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

  </header>
  <!-- Header Section End -->

  <!-- Services Section Start -->
  <section id="services" class="section">
    <div class="container">
      <div class="section-header d-none">
        <h2 class="section-title">Our Services</h2>
        <span>Services</span>
        <p class="section-subtitle">Judicial Operation Management System is an online system.</p>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="icon color-5">
              <i class="lni-files"></i>
            </div>
            <h4>Case Filing</h4>
            <p>Filing of Case.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.4s">
            <div class="icon color-2">
              <i class="lni-cog"></i>
            </div>
            <h4>Summary of Fees</h4>
            <p>Fees for required services.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon color-1">
              <i class="lni-download"></i>
            </div>
            <h4>Forms</h4>
            <p>Download Forms.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 d-none">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.8s">
            <div class="icon color-4">
              <i class="lni-layers"></i>
            </div>
            <h4>UI/UX Design</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 d-none">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="1s">
            <div class="icon color-5">
              <i class="lni-tab"></i>
            </div>
            <h4>App Development</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 d-none">
          <div class="item-boxes services-item wow fadeInDown" data-wow-delay="1.2s">
            <div class="icon color-6">
              <i class="lni-briefcase"></i>
            </div>
            <h4>Digital Marketing</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services Section End -->

  <!-- Call to Action Start -->
  <section class="call-action section d-none">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="cta-trial text-center">
            <h3>Are You Ready To Get Started?</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod<br> Lorem ipsum dolor sit amet, consectetuer</p>
            <a href="#" class="btn btn-common btn-effect">Purchase Now!</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Call to Action End -->

  <!-- Features Section Start -->
  <section id="features" class="section d-none">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Why Choose Us</h2>
        <span>Why</span>
        <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>
      </div>
      <div class="row">
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-layout"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-layout"></i></div>
              <h4>Refreshing Design</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-tab"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-tab"></i></div>
              <h4>Fully Responsive</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-rocket"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-rocket"></i></div>
              <h4>Fast & Smooth</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-database"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-database"></i></div>
              <h4>SEO Optimized</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-leaf"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-leaf"></i></div>
              <h4>Clean Code</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
        <!-- Start featured -->
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="featured-box">
            <div class="featured-icon">
              <i class="lni-pencil"></i>
            </div>
            <div class="featured-content">
              <div class="icon-o"><i class="lni-pencil"></i></div>
              <h4>Free 24/7 Support</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.</p>
            </div>
          </div>
        </div>
        <!-- End featured -->
      </div>
    </div>
  </section>
  <!-- Features Section End -->






  <!-- Contact Section Start -->
  <section id="contact" class="section">
    <div class="contact-form">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Get In Touch</h2>
          <span>Contact</span>
          <!-- <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p> -->
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-9 col-xs-12">
            <div class="contact-block">
              <form id="contactForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" id="message" placeholder="Your Message" rows="7" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button">
                      <button class="btn btn-common btn-effect" id="submit" type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 hidden"></div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-xs-12">
            <div class="contact-deatils">
              <!-- Content Info -->
              <div class="contact-info_area">
                <div class="contact-info">
                  <i class="lni-map"></i>
                  <h5>Location</h5>
                  <p>JUDICIAL SERVICE COMMISSION <br> HIGH COURT COMPLEX <br> P.M.B. 3033 <br> PORT HARCOURT <br> RIVERS STATE</p>

                </div>
                <!-- Content Info -->
                <div class="contact-info">
                  <i class="lni-star"></i>
                  <h5>E-mail</h5>
                  <p>email: info@rsjsc.rv.gov.ng</p>
                </div>
                <!-- Icon -->
                <ul class="footer-social">
                  <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->



  <!-- Footer Section Start -->
  <footer>
    <!-- Footer Area Start -->
    <section class="footer-Content d-none">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
            <h3><img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="200"></h3>
            <div class="textwidget">
              <p>If you think you have the passion,
                attitude and capability to join us
                the next big software company
                s so that we can get the convers.</p>
            </div>
            <ul class="footer-social">
              <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
              <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
              <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
              <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12 d-none">
            <div class="widget">
              <h3 class="block-title">Short Link</h3>
              <ul class="menu">
                <li><a href="#">Service</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Advance Sarch</a></li>
                <li><a href="#">Site Map</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12 d-none">
            <div class="widget">
              <h3 class="block-title">Contact Us</h3>
              <ul class="contact-footer">
                <li>
                  <strong>Address :</strong>
                  <!-- <span>1900 Pico Blvd, New York br Centernial, colorado</span> -->
                </li>
                <li>
                  <strong>Phone :</strong>
                  <!-- <span>+48 123 456 789</span> -->
                </li>
                <li>
                  <strong>E-mail :</strong>
                  <!-- <span><a href="#">info@example.com</a></span> -->
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12 d-none">
            <div class="widget">
              <h3 class="block-title">Instagram</h3>
              <ul class="instagram-footer">
                <li><a href="#"><img src="website_asset/img/instagram/insta1.jpg" alt=""></a></li>
                <li><a href="#"><img src="website_asset/img/instagram/insta2.jpg" alt=""></a></li>
                <li><a href="#"><img src="website_asset/img/instagram/insta3.jpg" alt=""></a></li>
                <li><a href="#"><img src="website_asset/img/instagram/insta4.jpg" alt=""></a></li>
                <li><a href="#"><img src="website_asset/img/instagram/insta5.jpg" alt=""></a></li>
                <li><a href="#"><img src="website_asset/img/instagram/insta6.jpg" alt=""></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="site-info float-left">
              <p>Crafted by <a href="https://www.alltsnetwork.com/" rel="nofollow">&copy; 2020 ALL-TECH SYSTEMS & CO.</a></p>
            </div>
            <div class="float-right">
              <ul class="nav nav-inline">
                <li class="nav-item">
                  <a class="nav-link active" href="#">About Prime</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">TOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Return Policy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright End -->

  </footer>
  <!-- Footer Section End -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
  </a>

  <!-- <div id="loader">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div> -->

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="website_asset/js/jquery.min.js"></script>
  <script src="website_asset/js/popper.min.js"></script>
  <script src="website_asset/js/bootstrap.min.js"></script>
  <!-- <script src="website_asset/js/classie.js"></script> -->
  <!-- <script src="website_asset/js/color-switcher.js"></script> -->
  <script src="website_asset/js/jquery.mixitup.js"></script>
  <script src="website_asset/js/nivo-lightbox.js"></script>
  <script src="website_asset/js/owl.carousel.js"></script>
  <script src="website_asset/js/jquery.stellar.min.js"></script>
  <script src="website_asset/js/jquery.nav.js"></script>
  <script src="website_asset/js/scrolling-nav.js"></script>
  <script src="website_asset/js/jquery.easing.min.js"></script>
  <script src="website_asset/js/wow.js"></script>
  <script src="website_asset/js/jquery.vide.js"></script>
  <script src="website_asset/js/jquery.counterup.min.js"></script>
  <script src="website_asset/js/jquery.magnific-popup.min.js"></script>
  <script src="website_asset/js/waypoints.min.js"></script>
  <script src="website_asset/js/form-validator.min.js"></script>
  <script src="website_asset/js/contact-form-script.js"></script>
  <script src="website_asset/js/main.js"></script>

</body>

</html>