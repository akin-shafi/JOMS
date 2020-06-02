<?php require_once('private/initialize.php'); ?>
<?php

// ========== TO LOGIN ==========
$errors = [];
$email = '';
$password = '';

if (is_post_request()) {
  $clients = $_POST['clients'] ?? '';
  $login = $_POST['login'] ?? '';

  if ($clients) {
    // Create record using post parameters
    $clients = new Clients($clients);

    $result = $clients->save();

    if ($result === true) {

      redirect_to(url_for('index.php'));
    } else {
      $errors[] = $clients->errors;
    }
  } elseif ($login) {

    $email = $login['email'] ?? '';
    $password = $login['password'] ?? '';

    // Validations
    if (is_blank($email)) {
      $errors[] = "Email cannot be blank.";
    }
    if (is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }


    // if there were no errors, try to login
    if (empty($errors)) {
      $clients = Clients::find_by_email($email);
      $admin = Admin::find_by_email($email);

      // test if firm found and password is correct
      if ($clients != false && $clients->verify_password($password)) {


        // Logged out Customer and riders before login in firm
        $session->logout(true); //for firm logout

        // Mark firm as logged in
        $session->login($clients, true);

        //for logging actions in the log file
        log_action('Client Login', "{$clients->firm_name}{$clients->first_name} Logged in.", "login");

        redirect_to(url_for('lawyer/'));
      } else {
        // email not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
      // test if admin found and password is correct
      if ($admin != false && $admin->verify_password($password)) {


        // Logged out Customer and riders before login in firm
        $session->logout(true); //for firm logout

        // Mark firm as logged in
        $session->login($admin);

        //for logging actions in the log file
        log_action('Admin Login', "{$admin->first_name} Logged in.", "login");
        // if ($admin->level !== 9) {
        redirect_to(url_for('high-court/'));
        // }

      } else {
        // email not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }
} else {
  $clients = new Clients;
}

// echo "<pre>";
// print_r($clients);
// echo "</pre>";
// ========== TO LOGIN END==========


?>




<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOMS - Login</title>
    <link rel="stylesheet" type="text/css" href="website_asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/line-icons.css">
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
                    <div><h3>Welcome to <br> Judicial Service Commission</h3></div>
                    <div><p>Fill the form, to log into your portal.</p></div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">

                  <div class="form-items">
                    <img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="200">
                    <!-- <h3>RSJC Operation Management System.</h3> -->
                    <p>Providing a faster Judicial Process.</p>
                    <div class="page-links">
                      <a href="index.php" class="">Home</a>
                      <a href="login.php" class="active">Login</a><a href="register.php">Register</a>
                    </div>
                    <form method="post">
                      <?php if ($errors) { ?>
                      <div class="p-2 alert-info mb-3 rounded">
                        <?php echo display_errors($errors); ?>
                        
                      </div>
                    <?php } ?>
                      <!-- <div class="">  -->
                        
                        <?php echo display_session_message(); ?>
                      <!-- </div> -->
                      <input type="email" class="form-control" name="login[email]" value="" placeholder="E-mail Address">

                      <input type="password" class="form-control" name="login[password]" value="" placeholder="Password" id="password">
                      <div class="text-right clearfix">
                        <i class="la la-user btn btn-sm text-dark float-right" style="font-size: 14px" id="eye">Show</i>
                        <b class="form-text text-white" id="passwordErr"></b>
                      </div>
                      <div class="form-button">
                        <input type="submit" class="ibtn" value="Login">
                        <a href="forget.php">Forget password?</a>
                      </div>
                    </form>
                    <div class="other-links">
                      <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  <script src="website_asset/js/jquery.min.js"></script>
  <script src="website_asset/js/popper.min.js"></script>
  <script src="website_asset/js/bootstrap.min.js"></script>
  <script src="website_asset/js/main.js"></script>

  <script>
   var showPass = 0;
    $('#eye').on('click', function(e){
      // console.log(e.target);
        if(showPass == 0) {
            $('#password').attr('type','text');
            $(this).text('hide');
            // $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else {
            $('#password').attr('type','password');
            $(this).text('show');
            // $(this).find('i').removeClass('fa-eye-slash');
            showPass = 0;
        }
        
    });

  </script>
</body>

</html>