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

		echo "Data successfully saved";

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

		echo "Data successfully saved";

	} elseif ($type == 'log' && $campaign == 'toyota'){

		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$company = isset($_POST['company']) ? $_POST['company'] : "";
		$dealer_code = isset($_POST['dealer_code']) ? $_POST['dealer_code'] : "";
		$sap_id = isset($_POST['sap_id']) ? $_POST['sap_id'] : "";

		$call_source = isset($_POST['call_source']) ? $_POST['call_source'] : "";
		$call_type = isset($_POST['call_type']) ? $_POST['call_type'] : "";
		$call_resolution = isset($_POST['call_resolution']) ? $_POST['call_resolution'] : "";
		$note = $_POST['note'][0] . "<br>" . $_POST['note'][1] . "<br>" . $_POST['note'][2] . "<br>" . $_POST['note'][3];

		// Timestamp when the process is created.
		$created_at = date("Y-m-d H:i:s");

		$sql = "INSERT INTO toyota_log (`agent_name`, `phone`, `name`, `company`, `dealer_code`, `sap_id`, `call_source`, `call_type`, `call_resolution`,  `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$name', '$company', '$dealer_code', '$sap_id', '$call_source', '$call_type', '$call_resolution', '$created_at', '$sent_status')";

		echo "Data successfully saved";

	} elseif ($type == 'log' && $campaign == 'dha'){

		$job_type = isset($_POST['job_type']) ? $_POST['job_type'] : "";

		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$suburb = isset($_POST['suburb']) ? $_POST['suburb'] : "";
		$state = isset($_POST['state']) ? $_POST['state'] : "";
		$postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : "";
		$details = isset($_POST['details']) ? $_POST['details'] : "";

		$call_relation = isset($_POST['call_relation']) ? $_POST['call_relation'] : "";

		// Timestamp when the process is created.
		$created_at = date("Y-m-d H:i:s");

		$sql = "INSERT INTO dha_log (`agent_name`, `phone`, `job_type`, `name`, `contact_number`, `address`, `suburb`, `state`, `postal_code`, `details`, `call_relation`,  `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$job_type', '$name', '$contact_number', '$address', '$suburb', '$state', '$postal_code', '$details', '$call_relation', '$created_at', '$sent_status')";

		echo "Data successfully saved";

	} elseif ($type == 'log' && $campaign == 'jlr'){

		$job_type = isset($_POST['job_type']) ? $_POST['job_type'] : "";

		$reason = isset($_POST['reason']) ? $_POST['reason'] : "";
		$vehicle_registration = isset($_POST['vehicle_registration']) ? $_POST['vehicle_registration'] : "";

		$call_relation = isset($_POST['call_relation']) ? $_POST['call_relation'] : "";

		// Timestamp when the process is created.
		$created_at = date("Y-m-d H:i:s");

		$sql = "INSERT INTO jlr_log (`agent_name`, `phone`, `job_type`, `vehicle_registration`, `reason`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$job_type', '$vehicle_registration', '$reason', '$created_at', '$sent_status')";

		header('Location: ../_jlr/confirmation.php');

		echo "Data successfully saved";

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