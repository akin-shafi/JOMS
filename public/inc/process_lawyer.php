<?php require_once('../../private/initialize.php') ?>

<?php

if (isset($_POST['court_case'])) {

  $args = $_POST['court_case'];
  $courtCase = new CourtCase($args);
  $courtCase->attach_file($_FILES['document']);
  $courtCase->client_id = $loggedInClient->id;
  $result = $courtCase->savef();
  //  echo "<pre>";
  //  print_r($courtCase);
  //  print_r($courtCase->errors);
  //  echo "</pre>";
  if ($result === true) {
    echo 'FIlling saved, Please choose your mode of payment!';
      // $session->message('Your registration was successfully.');
      // redirect_to(url_for('lawyer/index.php'));
  }
}