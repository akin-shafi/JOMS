<?php
require_once('../../private/initialize.php');
if (in_array($loggedInAdmin->level, [1, 3])) {
  redirect_to(url_for('/high-court/judge/'));
} elseif (in_array($loggedInAdmin->level, [2, 4])) {
  redirect_to(url_for('/high-court/registrar/'));
} elseif (in_array($loggedInAdmin->level, [5, 6])) {
  redirect_to(url_for('/high-court/bursar/'));
} elseif ($loggedInAdmin->level == 7) { 
  redirect_to(url_for('/high-court/bailiff/'));
} elseif ($loggedInAdmin->level == 8) {
  redirect_to(url_for('/high-court/clerk/'));
} elseif ($loggedInAdmin->level == 10) {
  redirect_to(url_for('/high-court/mgt/'));
}elseif ($loggedInAdmin->level == 11) { //Directorate of public prosecution
  redirect_to(url_for('/dpp'));
}elseif ($loggedInAdmin->level == 12) { // Nigeria Police Force
  redirect_to(url_for('/police/'));
}elseif ($loggedInAdmin->level == 13) { // Nigeria prison Service
  redirect_to(url_for('/prison/'));
}
