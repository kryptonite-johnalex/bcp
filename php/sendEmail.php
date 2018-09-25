<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connect.php');

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Define variables
    $name = 'Service';
    $email = 'service@contact121.com.au';

	$agent = $_SESSION['agent'];
	$phone = $_SESSION['phone'];
	$epoch = date("Y-m-d H:i:s", $_SESSION['epoch']);

	$form_type = $_POST["form_type"];
	$campaign = $_POST["campaign"];

	if($campaign = 'widescreen') { 

        // Creating POST variable and assign value
        if(isset($_POST)) {
            foreach($_POST as $key=>$value) {
                $$key = $value;
            }
        }

        $recipient = '0425706467@transmitsms.com, 0474848811@transmitsms.com, service@contact121.com.au';

    } else {
        $job_accept = $_POST["job_accept"];
        //bu_code => string(66) "482M|servicensw.anz@engie.com; service@contact121.com.au|297144700" 
        $bu_code_array = explode("|", $_POST["bu_code"]);

    	$bu_code = $bu_code_array[0];

    	// Define who recieves the emails
    	$recipient = $bu_code_array[1];

    	$subcontractor_phone_email = (isset($_POST["subcontractor_phone_email"])) ? $_POST["subcontractor_phone_email"] : "N/A";
    	$pronto_num = (isset($_POST["pronto_num"])) ? $_POST["pronto_num"] : "N/A";
    	$work_type = (isset($_POST["work_type"])) ? $_POST["work_type"] : "N/A";
    	$branch = (isset($_POST["branch"])) ? $_POST["branch"] : "N/A";
    	$branch_email = (isset($_POST["branch_email"])) ? $_POST["branch_email"] : "N/A";
    	$site_name = (isset($_POST["site_name"])) ? $_POST["site_name"] : "N/A";
    	$site_address = (isset($_POST["site_address"])) ? $_POST["site_address"] : "N/A";
    	$caller_name = (isset($_POST["caller_name"])) ? $_POST["caller_name"] : "N/A";
    	$caller_phone = (isset($_POST["caller_phone"])) ? $_POST["caller_phone"] : "N/A";
    	$subject = (isset($_POST["subject"])) ? $_POST["subject"] : "N/A";
    	$tech_allocated = (isset($_POST["tech_allocated"])) ? $_POST["tech_allocated"] : "N/A";
    	$tech_attends = (isset($_POST["tech_attends"])) ? $_POST["tech_attends"] : "N/A";

    	if($form_type != 'direct') {
    		$issues = $_POST["issues"][0] . "<br>" . $_POST["issues"][1] . "<br>" . $_POST["issues"][2];
    		$notes = $_POST["notes"][0] . "<br>" . $_POST["notes"][1] . "<br>" . $_POST["notes"][2];
    	} else {
    		$other = (isset($_POST['other'])) ? $_POST['other'] : 'N/A';
    		$details = $_POST["details"][0] . "<br>" . $_POST["details"][1] . "<br>" . $_POST["details"][2];
    	}
    }

	$tech_allocation_required = (isset($_POST["tech_allocation_required"])) ? $_POST["tech_allocation_required"] : "N/A";
	$call_type = (isset($_POST["call_type"])) ? $_POST["call_type"] : "N/A";

	if($campaign == 'engie' || $campaign == 'engiem' && $form_type == 'direct') {
		// Build the email content.
        $email_content = "Contact Direct Details:<br><br><br>";

        $email_content .= "BU Code: $bu_code[1]<br><br><br>";

        $email_content .= "Branch: $branch<br><br>";
        $email_content .= "Branch Email: $branch_email<br><br>";

        $email_content .= "Site Name: $site_name<br><br>";
        $email_content .= "Site Address: $site_address<br><br>";
        $email_content .= "Caller Name: $caller_name<br><br>";
        $email_content .= "Caller Phone: $caller_phone<br><br>";
        $email_content .= "Subject: $subject<br><br>";
        $email_content .= "Other: $other<br><br>";
        $email_content .= "Details: $details[0]<br>$details[1]<br>$details[2]<br><br>";

	} elseif ($campaign == 'engie' || $campaign == 'engiem' && $form_type == 'allocation') {
		// Build the email content.
        $email_content = "Details:<br><br><br>";

        $email_content .= "Job Accept: $job_accept<br>";
        $email_content .= "BU Code: $bu_code[1]<br><br><br>";
        
        if($job_accept == 'yes') {
        	$email_content .= "Subcontractor Phone/Email: $subcontractor_phone_email<br>";
        }
        $email_content .= "Pronto Number: $pronto_num<br><br><br>";
        $email_content .= "Work Type: $work_type<br><br>";

        $email_content .= "Branch: $branch<br><br>";
        if($job_accept == 'no') {
        	$email_content .= "Branch Email: $branch_email<br><br>";
        }
        $email_content .= "Site Name: $site_name<br><br>";
        $email_content .= "Site Address: $site_address<br><br>";
        $email_content .= "Caller Name: $caller_name<br><br>";
        $email_content .= "Caller Phone: $caller_phone<br><br>";
        $email_content .= "Subject: $subject<br><br>";
        $email_content .= "Tech Allocated: $tech_allocated<br><br>";
        $email_content .= "Is the Tech Attending?: $tech_attends<br><br>";
        $email_content .= "Issue Reported: $issues[0]<br>$issues[1]<br>$issues[2]<br><br>";
        $email_content .= "Additional Notes: $notes[0]<br>$notes[1]<br>$notes[2]<br><br>";

        $email_content .= "Is Tech Allocation Required?: $tech_allocation_required<br><br>";
        if($job_accept == 'no') {
        	$email_content .= "Type of Call: $call_type<br><br>";
		}
    } elseif ($campaign == 'widescreen' && $form_type == 'log') {

        $subject = "Emergency Call Out";

        // Build the email content.
        $email_content = "A new after hours emergency call out request has been recieved::<br><br><br>";

        $email_content .= "Insurance Brand/Retail : $brand <br>";
        $email_content .= "Authorised By : $authorised<br>";
        $email_content .= "Customer : $customer_name<br>";
        $email_content .= "Phone Number : $phone_number<br>";
        $email_content .= "Address : $address <br>";
        $email_content .= "Claim Number : $claim_number <br>";
        $email_content .= "Policy Number : $policy_number <br>";
        $email_content .= "Vehicle Make : $vehicle <br>";
        $email_content .= "Vehicle Model : $model <br>";
        $email_content .= "Vehicle Year : $year <br>";
        $email_content .= "Glass : $glass <br>";
        $email_content .= "Price : $price <br><br><br>";

        $email_content .= "Please respond to this number.<br><br>";

        $email_content .= "Agent: $agent";

        $date_time = date("m/d/Y H:m:s", $_SESSION['epoch']);

        $email_content .= "Time: $date_time";
        //$email_content .= "Time: 09/09/2018 14:09:42";
    } else {
    	echo "<h1>Error! Please contact Development Engineer ASAP.</h1>";
    }

    $created_at = date("Y-m-d H:i:s");

    // Build the email headers.
    $email_headers = "MIME-Version: 1.0" . "\n";
    $email_headers .= "Content-type:text/html;charset=UTF-8" . "\n";
    $email_headers .= "From: $name <$email>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
        $sent_status = 1;
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
        $sent_status = 0;
    }

    if($form_type == 'direct') {
    	$sql = "INSERT INTO " . $campaign . "_direct (`agent_name`, `phone`, `fire_type`, `bu_code`, `branch`, `branch_email`, `site_name`, `site_address`, `caller_name`, `caller_phone`, `subject`, `other`, `details`, `epoch`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$fire_type', '$bu_code', '$branch', '$branch_email', '$site_name', '$site_address', '$caller_name', '$caller_phone', '$subject', '$other', '$details', '$epoch', '$created_at', '$sent_status')";
    } elseif ($campaign == 'widescreen' && $form_type == 'log') {
        $sql = "INSERT INTO widescreen_log (`agent_name`, `phone`, `brand`, `authorised`, `customer_name`, `phone_number`, `address`, `claim_number`, `policy_number`, `vehicle`, `model`, `year`, `glass`, `price`, `epoch`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$brand', '$authorised', '$customer_name', '$phone_number', '$address', '$claim_number', '$policy_number', '$vehicle', '$model', '$year', '$glass', '$price', '$epoch', '$created_at', '$sent_status')";
    }else {
		$sql = "INSERT INTO " . $campaign . "_allocation (`agent_name`, `phone`, `fire_type`, `job_accept`, `bu_code`, `subcontractor_phone_email`, `pronto_num`, `work_type`, `branch`, `branch_email`, `site_name`, `site_address`, `caller_name`, `caller_phone`, `subject`, `tech_allocated`, `tech_attends`, `issues`, `notes`, `tech_allocation_required`, `call_type`, `epoch`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$fire_type', '$job_accept', '$bu_code', '$subcontractor_phone_email', '$pronto_num', 'work_type', '$branch', '$branch_email', '$site_name', '$site_address', '$caller_name', '$caller_phone', '$subject', '$tech_allocated', '$tech_attends', '$issues', '$notes', '$tech_allocation_required', '$call_type', '$epoch', '$created_at', '$sent_status')";
	}

	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

    $conn->close();

    if(isset($_POST['call_type']) == 'yes') {
		header('Location: ../_' . $campaign . '/emergency-yes.php?bu_email=' . $bu_code_array[1] . '&bu_phone=' . $bu_code_array[2]);
	}

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}