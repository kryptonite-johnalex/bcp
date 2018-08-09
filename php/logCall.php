<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connect.php');

// My modifications to mailer script
// Added input sanitizing to prevent injection

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$type = isset($_POST['form_type']) ? strip_tags(trim($_POST["form_type"])) : "";
	$campaign = isset($_POST['campaign']) ? $_POST['campaign'] : "";
	$sent_status = 0;

	$agent = $_SESSION['agent'];
    $phone = $_SESSION['phone'];

	if ($type == 'log' && $campaign == 'dcsi') {

		$details = $_POST['details'];
		$property_num = $_POST['property_num'];
		$chintaro = isset($_POST['chintaro']) ? 1 : 0;
		$chintaro_option = isset($_POST['chintaroList']) ? $_POST['chintaroList'] : "";
		$reminder = isset($_POST['reminder']) ? $_POST['reminder'] : "";

		// Timestamp when the process is created.
		$created_at = date("Y-m-d H:i:s");

		$sql = "INSERT INTO dcsi_log (`agent_name`, `phone`, `details`, `property_num`, `chintaro`, `chintaro_option`, `reminder`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$details', '$property_num', '$chintaro', '$chintaro_option', '$reminder', '$created_at', '$sent_status')";

	} elseif ($type == 'log' && $campaign == 'riskman'){

		$disability_service = $_POST['option'];

		if ($disability_service == 'yes') {
			$supervisor_notified = $_POST['optionYes'];
			$working_today = '-';
		} else {
			$supervisor_notified = '-';
			$working_today = $_POST['optionNo'];
		}

		$caller_type = $_POST['caller_type'];
		$incident_report = $_POST['incident_report'];
		$report_num = $_POST['report_num'];

		// Timestamp when the process is created.
		$created_at = date("Y-m-d H:i:s");

		$sql = "INSERT INTO riskman_log (`agent_name`, `phone`, `disability_service`, `supervisor_notified`, `working_today`, `caller_type`, `incident_report`, `report_num`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$disability_service', '$supervisor_notified', '$working_today', '$caller_type', '$incident_report', '$report_num', '$created_at', '$sent_status')";

	} else {
		echo "<h1>Error! Please contact Development Engineer ASAP</h1>";
	}

	if ($conn->query($sql) === TRUE) {
	// echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
} else {
	// Not a POST request, set a 403 (forbidden) response code.
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}
?>