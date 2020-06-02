<?php

// Connexion à la base de données
require_once('bdd.php');
// require_once('../../private/initialize.php');

//echo $_POST['court_case_name'];
if (isset($_POST['court_case_name']) && isset($_POST['assigned_to_judge_on']) && isset($_POST['description']) && isset($_POST['end']) && isset($_POST['color'])) {

	$title = $_POST['court_case_name'];
	$start = $_POST['assigned_to_judge_on'];
	$description = $_POST['description'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	$sql = "INSERT INTO `court_case`(id, court_id, client_id, status, approval, court_type, court_division, court_matter, judge_incharge_id, court_case_name, description, document, created_on, assigned_to_judge_on, end, assigned_by, color, deleted) VALUES ('','','','','','','','','','$title','$description','','','$start','$end','','$color','')";

	$req = $bdd->prepare($sql);
	$req->execute();

	// echo $sql;

	$query = $bdd->prepare($sql);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('Error execute');
	}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
