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

    $_POST['created_at'] = $created_at = date("Y-m-d H:i:s");

    // Insert in Database
    if($form_type == 'quote') {

        // unset($_POST['form_type']); unset($_POST['campaign']); unset($_POST['job_accept']); // or
        // $exclude = array("campaign","job_accept");

        (isset($_POST['purchased'])) ?: $_POST['purchased'] = 'no';

        $exclude = array("campaign", "sent_status", "action");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);

    } elseif($form_type == 'general_enquiry' || $form_type == 'customer_service') {
        $exclude = array("campaign", "sent_status", "action");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);
    } elseif($form_type == 'escalation') {

        $subject = "PetBarn - Escalation";

        // Building the Email Content
        $email_content = '';
        $email_content .= "<h4><strong>Escalation Details:</strong></h4><br>";
        $email_content .= "First Name: $first_name<br><br>";
        $email_content .= "Surname: $last_name<br>";
        $email_content .= "Phone Number: $phone_number<br><br>";
        $email_content .= "Address 1: $address_1<br>";
        $email_content .= "Address 2: $address_2<br>";
        $email_content .= "Suburb: $suburb<br>";
        $email_content .= "State: $state<br>";
        $email_content .= "Postcode: $postcode<br>";
        $email_content .= "Details: $details<br><br><br>";

        $email_content .= "This call was taken by $agent at $epoch<br>";

        // Email Receiver
        $recipient = 'resolutions@petsure.com.au';

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

        $_POST['sent_status'] = $sent_status;

        $exclude = array("campaign", "action");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);
    } else {
        echo "<h1>Error in undentifiying ! <br> Please contact Development Engineer ASAP.</h1>";
    }

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    if(isset($action) == 'Yes') {
        header('Location: ../_' . $campaign . '/index.php');
    }

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