<?php
include '../app/call.php';

if (isset($_POST['check_email'])) {
			$adminEmail = $_POST['check_email'];
			$email_report = checkEmail($conn,$adminEmail);
			echo json_encode(array('error' => $email_report));
}

if (isset($_POST['check_username'])) {
			$adminUsername = $_POST['check_username'];
			$email_report = checkUserName($conn,$adminUsername);
			echo json_encode(array('error' => $email_report));
}

if (isset($_GET['signup']) && $_GET['signup']=='true') {
	$insert =  insertAdminUser($conn, $_POST);
	echo "string";

}

