<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connect.php');

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$agent = $_SESSION['agent'];
	$phone = $_SESSION['phone'];
	$fire_type = ($_SESSION['did_extension'] == "61870791062") ? "HV" : "LV";
	$epoch = date("Y-m-d H:i:s", $_SESSION['epoch']);

	$campaign = $_POST['campaign'];

	$caller_name = $_POST['caller_name'];
	$caller_phone = $_POST['caller_phone'];
	$debtor_name = $_POST['debtor_name'];
	$site_name = $_POST['site_name'];
	$address = $_POST['address'];
	$building = $_POST['building'];
	$powo = $_POST['powo'];
	$issue = $_POST['issue'][0] . "<br>" . $_POST['issue'][1];
	$urgency = $_POST['urgency'];
	$tech_allocation_required = $_POST['tech_allocation_required'];
	$created_at = date("Y-m-d H:i:s");
	$sent_status = 0;


	// $sql = "INSERT INTO " . $campaign . "_log (`agent_name`, `phone`, `fire_type`, `caller_name`, `caller_phone`, ". ( isset($_POST['vs_job']) ? "`vs_job`, " : "") . "`debtor_name`, `site_name`, `address`, `building`, `powo`, `issue`, `urgency`, `tech_allocation_required`, `epoch`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$fire_type', '$caller_name', '$caller_phone', ". ( isset($_POST['vs_job']) ? "'" . $_POST['vs_job'] . "', " : "") . "'$debtor_name', '$site_name', '$address', '$building', '$powo', '$issue', '$urgency', '$tech_allocation_required', '$epoch', '$created_at', '$sent_status')";

	switch ($_POST['tech_allocation_required']) {
		case 'yes':

			header('Location: ../_' . $campaign . '/tech-yes.php');
			break;

		case 'no':
			//header('Location: ../_engie/tech-no.php?tech_allocation=no');
			header('Location: ../_' . $campaign . '/tech-no.php');
			break;

		default:
			# code...
			break;
	}

	// if($campaign == 'engie' || $campaign == 'engiem') {

	// 	$subject = "Emergency Call Out";

	//     // Build the email content.
	//     $email_content = "A new after hours emergency call out request has been recieved::<br><br><br>";

	//     $email_content .= "";

	// } else {
	// 	echo "<h1>Error! Please contact Development Engineer ASAP.</h1>";
	// }

	// Remove below due PHP version compatibility 
	// if(filter_var($_GET['form_empty'], FILTER_VALIDATE_BOOLEAN) != true) {
	// if($_GET['form_empty'] == 'false') {
	// 	if ($conn->query($sql) === TRUE) {
	//         // echo "New record created successfully";
	//     } else {
	//         echo "Error: " . $sql . "<br>" . $conn->error;
	//     }
	// }

 	// $conn->close();

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}