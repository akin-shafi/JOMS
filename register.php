<?php
require_once('private/initialize.php');

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
        // $result = true;

        if ($result === true) {
            $session->message('Your registration was successful!.  Enter Credentials to Login');
            redirect_to(url_for('../login.php'));
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

                redirect_to(url_for('client/index.php'));
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
                if ($admin->level == 4) {
                    redirect_to(url_for('admin/judges/dashboard.php'));
                }
                redirect_to(url_for('admin/dashboard.php'));
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
?>
<?php $page_title = "Firm | Registration"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="website_asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="website_asset/css/iofrm-style.css">
    <!-- <link rel="stylesheet" type="text/css" href="website_asset/css/iofrm-theme23.css"> -->
    <link rel="stylesheet" type="text/css" href="website_asset/css/iofrm-theme15.css">
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('css/validatePassword.css') ?>">

</head>
<style type="text/css">
    a {
        color: #00416b !important;
    }

    .form-holder .form-content {
        text-align: left !important;
    }

    .control-label {
        font-weight: bold !important;
    }


</style>

<body>
    <div class="form-body on-top-mobile">
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
                        <img src="website_asset/img/qoute_of_arm.png">
                        <!-- <br> -->
                        <!-- Rivers State Judicial Service Commission -->
                    </div>
                    <div><h3> Welcome to the Judicial Operation Management Systems</h3></div>
                    <div><p>Fill the form, accept the terms & agreement <br>to create your account login credentials.</p></div>
                </div>
            </div>
            <div class="form-holder ">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  font-weight-bold text-uppercase" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold text-uppercase" href="register.php">Firm </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-uppercase" href="private.php">Private </a>
                    </li>

                </ul>

                <div class="tab-content  form-content  pt-1">


                    <div class="">
                        <div class="mb-3 text-center"><img src="website_asset/img/firm.png" width="90" alt=""></div>
                        <?php if ($errors) { ?>
                            <div class="p-2 alert-success mb-3 rounded">
                                <?php echo display_errors($errors); ?>
                            </div>
                        <?php } ?>

                        <div id="firm" class=" tab-pane active ">
                            <form method="post">
                                <div class="row">
                                    <input value="2" type="hidden" name="clients[clientcat]">
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="firm_name">Firm Name</label>
                                        <input class="form-control"  value="<?php echo $clients->firm_name; ?>" type="text" name="clients[firm_name]" id="firm_name"="FIRM NAME">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="cac_reg_no">CAC Reg No</label>
                                        <input class="form-control"  value="<?php echo $clients->cac_reg_no; ?>" type="text" name="clients[cac_reg_no]" id="cac_reg_no"="CAC REGISTRATION NUMBER">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="tin_number">TIN Number</label>
                                        <input class="form-control"  value="<?php echo $clients->tin_number; ?>" type="text" name="clients[tin_number]" id="tin_number"="TIN NUMBER">

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="address">Address</label>
                                        <input class="form-control"  value="<?php echo $clients->address; ?>" type="text" name="clients[address]" id="address"="ADDRESS">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="call_no">Call No of Principal/Partner</label>
                                        <input class="form-control"  value="<?php echo $clients->call_no; ?>" type="text" name="clients[call_no]" id="call_no"="PRINCIPAL PARTNER'S CALL NUMBER">

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="phone">Phone Number</label>
                                        <input class="form-control"  value="<?php echo $clients->phone; ?>" type="TEXT" name="clients[phone]" id="phone"="PHONE NUMBER">

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="email">Email</label>
                                        <input class="form-control"  value="<?php echo $clients->email; ?>" type="email" name="clients[email]" id="email"="EMAIL ADDRESS">
                                        <!-- <input type="text" class="form-control" ="Website, other links"> -->
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class="control-label" for="password">Password</label>
                                        <input class="form-control"  value="<?php echo $clients->password; ?>" type="password" name="clients[password]" id="psw">
                                        <div class="">
                                            
                                            <dl class="hod">
                                            <div id='message' class="-menu -menu-right" aria-labelledby="psw">
                                              <div class='clearfix' >
                                                <h3 class='popover-header'>Password must contain the following:</h3>
                                                <li id='capital' class='invalid'> An <b>UPPERCASE</b> letter</li><li id='letter' class='invalid'> A <b>lowercase</b> letter</li><li id='symbol' class='invalid'> A <b>symbol</b></li>
                                                <li id='number' class='invalid'> A <b>number</b></li>
                                                <li id='length' class='invalid'> Minimum <b>8 characters</b></li>
                                              </div>
                                              <div class='float-right' id='indicator'></div>
                                            </div>
                                            </dl>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 ">
                                        <label class="control-label" for="confirm_password">Confirm Password</label>
                                        <input class="form-control"  value="<?php echo $clients->confirm_password; ?>" type="password" name="clients[confirm_psw]" id="confirm_psw">
                                    </div>
                                </div>

                                <div class="row top-padding">
                                    <div class="col-12 col-sm-6">

                                        <input type="checkbox" id="chk1"><label for="chk1">I agree to the <a href="#">terms & conditions</a></label> &nbsp; &nbsp; &nbsp; &nbsp;
                                        <a href="login.php">
                                            << Back to login</a> </div> <div class="col-12 col-sm-6">
                                                <div class="form-button text-right">
                                                    <button id="submit" type="submit" class="ibtn less-padding">Submit Application</button>
                                                </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="website_asset/js/jquery.min.js"></script>
    <script src="website_asset/js/popper.min.js"></script>
    <script src="website_asset/js/bootstrap.min.js"></script>
    <!-- <script src="website_asset/js/main.js"></script> -->
    <script src="<?php echo url_for('js/validatePassword.js') ?>"></script>
</body>

</html>