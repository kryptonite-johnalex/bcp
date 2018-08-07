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


	if($type == 'log' && $campaign == 'dcsi') {

		$details = $_POST['details'];
        $property_num = $_POST['property_num'];
        $chintaro = isset($_POST['chintaro']) ? 1 : 0;
        $chintaro_option = isset($_POST['chintaroList']) ? $_POST['chintaroList'] : "";
        $reminder = isset($_POST['reminder']) ? $_POST['reminder'] : "";


        // Timestamp when the process is created.
    	$created_at = date("Y-m-d H:i:s");

		var_dump($_POST);
		$sql = "INSERT INTO dcsi_log (`agent_name`, `phone`, `details`, `property_num`, `chintaro`, `chintaro_option`, `reminder`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$details', '$property_num', '$chintaro', '$chintaro_option', '$reminder', '$created_at', '$sent_status')";

		if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
	    } else {
	        echo "Error: " . $sql . "<br>" . $conn->error;
	    }

	    $conn->close();

	}
}  else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>