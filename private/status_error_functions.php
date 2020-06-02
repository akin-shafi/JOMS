<?php

function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/index.php'));
  }
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors wow flash infinite text-danger animated\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      if (is_array($error)) {
        foreach ($error as $err) {
          $output .= "<li>" . h($err) . "</li>";
        }
      }else{
        $output .= "<li>" . h($error) . "</li>";
      }
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div class="alert-success alert text-center">' . h($msg) . '</div>';
  }
}


?>
