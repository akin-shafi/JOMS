<?php
require_once('../../../private/initialize.php');

if ($loggedInAdmin->level == 3) {
	redirect_to(url_for('/high-court/judge/admin_judge.php'));
} else {
	redirect_to(url_for('/high-court/judge/judge.php'));
}
