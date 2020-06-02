<?php require_once('private/initialize.php'); ?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/forget1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 11:36:23 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOMS - Forget Password</title>
    <link rel="stylesheet" type="text/css" href="website_asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/iofrm-theme15.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder simple-info">
                    <!-- <div><img src="website_asset/img/graphic6.svg" alt=""></div> -->
                <div class="text-center">
                    <img src="website_asset/img/graphic6.svg">
                    <!-- <br> -->
                    <!-- Rivers State Judicial Service Commission -->
                </div>
                    <div><h3>Welcome to <br>Rivers State Judicial Service Commission</h3></div>
                    <div><p>Fill the form, to send a password reset link to your email.</p></div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="200">
                    <!-- <h3>RSJC Operation Management System.</h3> -->
                        <p>Providing a faster Judicial Process.</p>
                        <form method="post">
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="ibtn btn-forget">Send Reset Link</button>
                                <span><<</span><a href="login.php"> Back to login</a>
                            </div>
                        </form>
                    </div>
                    <div class="form-sent">
                        <div class="tick-holder">
                            <div class="tick-icon"></div>
                        </div>
                        <h3>Password link sent</h3>
                        <p>Please check your inbox <a href="http://brandio.io/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="50393f36223d10393f36223d24353d203c3124357e393f">[email&#160;protected]</a></p>
                        <div class="info-holder">
                            <span>Unsure if that email address was correct?</span> <a href="#">We can help</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script data-cfasync="false" src="email-decode.min.js"></script><script src="jquery.min.js"></script>
<script src="website_asset/js/popper.min.js"></script>
<script src="website_asset/js/bootstrap.min.js"></script>
<script src="website_asset/js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/forget1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 11:36:23 GMT -->
</html>