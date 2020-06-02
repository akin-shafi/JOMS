<?php
require_once('../../../private/initialize.php');

if ($loggedInAdmin->level == 2) {
	redirect_to(url_for('/high-court/registrar/admin_judge.php'));
} else {
	redirect_to(url_for('/high-court/registrar/registrar.php'));
}
