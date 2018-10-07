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

	$_POST['agent_name'] = $agent = $_SESSION['agent'];
	$_POST['phone'] = $phone = $_SESSION['phone'];
	$_POST['epoch'] = $epoch = date("Y-m-d H:i:s", $_SESSION['epoch']);

    // Creating POST variable and assign value
    // alternative : extract($array);
    if(isset($_POST)) {
        foreach($_POST as $key=>$value) {
            $$key = $value;
        }
    }

    // Check and Extract the BU
    if(isset($bu_code)) {
        $bu_code_array = explode("|", $bu_code);
        $bu_code = $bu_code_array[0];
        // Define who recieves the emails
        $bu_email = $bu_code_array[1];
    } else {
        $bu_email = '0425706467@transmitsms.com, 0474848811@transmitsms.com, service@contact121.com.au';
    }

    // Redict to a page when call type 'yes'
    if(isset($call_type)) {
        if($call_type == 'yes') {
            header('Location: ../_' . $campaign . '/emergency-yes.php?bu_email=' . $bu_code_array[1] . '&bu_phone=' . $bu_code_array[2]);
        }
    }
    
    if(isset($_GET['not_empty'])) {
        // Redirect Initial Page to another page
        switch ($_POST['tech_allocation_required']) {
            case 'yes':
                // $_SESSION = $_POST;
                // session_write_close();
                header('Location: ../_' . $campaign . '/tech-yes.php');
                break;
            case 'no':
                //header('Location: ../_' . $campaign . '/tech-no.php?tech_allocate=no');
                header('Location: ../_' . $campaign . '/tech-no.php');
                break;
            default:
                # code...
                break;
        }

        if($_GET['not_empty'] == 'false') {
            exit();
        }
    }

    // Building the Email Content
    $email_content = '';
    if($campaign == 'engie_f' || $campaign == 'engie_m') {

        if($form_type == 'direct') {

            $subject = "Contact Direct Details";

            $email_content .= "<h4><strong>Contact Direct Details:</strong></h4><br>";
            $email_content .= "BU Code: $bu_code<br><br>";
            $email_content .= "Branch: $branch<br>";
            $email_content .= "Branch Email: $branch_email<br><br>";
            $email_content .= "Site Name: $site_name<br>";
            $email_content .= "Site Address: $site_address<br>";
            $email_content .= "Caller Name: $caller_name<br>";
            $email_content .= "Caller Phone: $caller_phone<br>";
            $email_content .= "Subject: $subject<br>";
            $email_content .= "Other: $other<br>";
            $email_content .= "Details: $details[0]<br>$details[1]<br>$details[2]<br><br>";

            // Email Receiver
            $recipient = $bu_email;

        } elseif($form_type == 'allocation') {

            $subject = "Engie";

            #$email_content .= "Details:<br><br>";
            #$email_content .= "Job Accept: $job_accept<br>";
            #$email_content .= "BU Code: $bu_code<br><br>";
            
            if($job_accept == 'yes') {
                $email_content .= "Subcontractor Phone/Email: $subcontractor_phone_email<br>";
            }
            $email_content .= "Pronto Number: $pronto_num<br>";
            $email_content .= "Type of Work: $work_type<br>";

            $email_content .= "Branch: $branch<br>";
            if($job_accept == 'no') {
                $email_content .= "Branch Email: $branch_email<br>";
            }
            $email_content .= "Site Name: $site_name<br>";
            $email_content .= "Site Address: $site_address<br>";
            $email_content .= "Caller Name: $caller_name<br>";
            $email_content .= "Caller Phone: $caller_phone<br>";
            $email_content .= "Subject: $subject<br>";
            #$email_content .= "Tech Allocated: $tech_allocated<br>";
            #$email_content .= "Is the Tech Attending?: $tech_attends<br>";
            $email_content .= "Issue Reported: <br>$issue[0].$issue[1].$issue[2]<br><br>";
            $email_content .= "Additional Notes: <br>$notes[0].$notes[1].$notes[2]<br>";

            #$email_content .= "Is Tech Allocation Required?: $tech_allocation_required<br><br>";

            if($_POST['tech_allocate'] == "no") {
            	#if($job_accept == 'no') {
                #	$email_content .= "Type of Call: $call_type<br><br>";
            	#}
            	$string = "NOT ";
            }
            
            $email_content .= "<span style='color: red'><strong>*NOTE: A tech has " . $string . "been allocated to this job. A tech will need to be allocated by the Branch.*</strong></span><br>";

            // Email Receiver
            $recipient = $bu_email;

        } elseif($form_type == 'log') {
            $subject = "Engie Log Details";

            $email_content .= "<h4><strong>Log Details:</strong></h4><br>";
            $email_content .= "Caller Name: $caller_name<br>";
            $email_content .= "Caller Phone: $caller_phone<br>";            
            $email_content .= "Debtor Name: $debtor_name<br>";
            $email_content .= "Site Name: $site_name<br>";
            $email_content .= "Address: $address<br>";
            $email_content .= "PO# or WO#: $powo<br>";
            $email_content .= "Fault/Issue: $issue[0]<br>$issue[1]<br>";
            $email_content .= "Urgency: $urgency<br>";
            $email_content .= "Is Tech Allocation Required?: $tech_allocation_required<br><br>";

            $recipient = '0425706467@transmitsms.com, 0474848811@transmitsms.com, service@contact121.com.au';
        } else {
            echo "<h1>Error in Building a Email Template (Engie)! <br> Please contact Development Engineer ASAP.</h1>";
        }
    } elseif ($campaign == 'widescreen') {

        $subject = "Emergency Call Out";

        $email_content .= "A new after hours emergency call out request has been recieved::<br><br>";
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

        // Email Receiver
        $recipient = '0425706467@transmitsms.com, 0474848811@transmitsms.com, service@contact121.com.au';

    } else {
        echo "<h1>Error in Building a Email Template! <br> Please contact Development Engineer ASAP.</h1>";
    }

    $email_content .= "<br>This call was taken by $agent at $epoch<br>";

    // Build the email headers.
    $email_headers = "MIME-Version: 1.0" . "\n";
    $email_headers .= "Content-type:text/html;charset=UTF-8" . "\n";
    $email_headers .= "From: $name <$email>";

    // Send the email.
    $recipient .= ", marveelou@gmail.com";
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

    $_POST['created_at'] = $created_at = date("Y-m-d H:i:s");
    $_POST['sent_status'] = $sent_status;

    // Insert in Database
    if($campaign == 'engie_f' || $campaign == 'engie_m') {

        $_POST['fire_type'] = $fire_type = ($_SESSION['did_extension'] == "61870791062") ? "HV" : "LV";

        // unset($_POST['form_type']); unset($_POST['campaign']); unset($_POST['job_accept']); // or
        $exclude = array("campaign","job_accept", "tech_allocate");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);

    } elseif($campaign == 'widescreen') {

        $exclude = array("form_type", "campaign");
        $sql = insert_array("widescreen_log", $_POST, $exclude);

    } else {
        echo "<h1>Error in undentifiying ! <br> Please contact Development Engineer ASAP.</h1>";
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

function insert_array($table, $data, $exclude = array()) {
    $fields = $values = array();

    if( !is_array($exclude) ) $exclude = array($exclude);

    foreach($data as $key => $value) {
        if( !in_array($key, $exclude) ) {
            if(!is_array($value)) {
                $fields[] = "`$key`";
                $values[] = "'" . $value . "'";
            } else {
                $fields[] = "`$key`";
                $new = "";
                foreach ($value as $key => $value) {
                    $new .= $value . ". ";
                }

                $values[] = "'" . $new . "'";
            }
        }
    }
    $fields = implode(",", $fields);
    $values = implode(",", $values);

    return "INSERT INTO `$table` ($fields) VALUES ($values)";
}
?>