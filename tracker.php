<?php
require_once "../../wp-load.php";
global $wpdb;
$name = $_POST['name'];
$projekt = $_POST['projekt'];

if (isset($_POST["aktiv"])) {
	$results = $wpdb->get_results("SELECT *  FROM `timetracker` WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	if ($results) {
		$results = $wpdb->get_results("UPDATE `timetracker` SET `aktiv` = 'false' , `ende` = now() WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	}

	$results = $wpdb->get_results("INSERT INTO timetracker (name,projekt,aktiv) VALUES ('" . $name . "', '" . $projekt . "', 'true')");
	$results = $wpdb->get_results("SELECT *  FROM `timetracker` WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	echo json_encode($results);
}

if (isset($_POST["pause"])) {

	$results = $wpdb->get_results("UPDATE `timetracker` SET `aktiv` = 'false' , `ende` = now() WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	$results = $wpdb->get_results("INSERT INTO timetracker (name,projekt,aktiv,pause) VALUES ('" . $name . "', 'Pause', 'true','" . $projekt . "')");
	$results = $wpdb->get_results("SELECT *  FROM `timetracker` WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	echo json_encode($results);
}

if (isset($_POST["feierabend"])) {
	$results = $wpdb->get_results("UPDATE `timetracker` SET `aktiv` = 'false' , `ende` = now() WHERE `name` = '" . $name . "' AND `aktiv` = 'true'");
	$results = $wpdb->get_results("SELECT *  FROM `timetracker` WHERE `aktiv` = 'true'");
	echo json_encode($results);
}

if (isset($_POST["init"])) {
	$results = $wpdb->get_results("SELECT *  FROM `timetracker` WHERE `aktiv` = 'true'");
	echo json_encode($results);
}
