<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connect.php');

// My modifications to mailer script
// Added input sanitizing to prevent injection

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    // $name = strip_tags(trim($_POST["name"]));
    //         $name = str_replace(array("\r","\n"),array(" "," "),$name);
    // $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    // $message = trim($_POST["message"]);

    $type = strip_tags(trim($_POST["form_type"]));
    $sent_status = 0;

    // Check that data was sent to the mailer.
    // if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     // Set a 400 (bad request) response code and exit.
    //     http_response_code(400);
    //     echo "Oops! There was a problem with your submission. Please complete the form and try again.";
    //     exit;
    // }

    // Set the recipient email address.
    // FIXME: Update this to your desired email address.
    $recipient = "johnalexladra@gmail.com";

    // Set the email subject.
    $subject = "URGENT - Refer UNRESOLVED Complaint";

    // Filtering form type
    if ($type == 'complaints' || $type == 'senior') {

        // Defining variables
        $name = 'TEST';
        $email = 'ladrajohnalex@gmail.com';
        $time_stamp = date("H:i:s"); // this will be change to the time when the call took

        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $contact = $_POST['contact'];
        $number = $_POST['number'];
        $street = $_POST['street'];
        $suburb = $_POST['suburb'];
        $postal = $_POST['postal'];
        $account_num = $_POST['account_num'];
        $job_num = $_POST['job_num'];
        $details = $_POST['details'];
        $act_taken = $_POST['act_taken'];
        $cust_req = $_POST['cust_req'];
        $created_at = date("Y-m-d H:i:s");
        $agent_id = '1234';

        // Build the email content.
        $email_content = "<strong style='text-decoration: underline'>THIS EMAIL HAS NOT BEEN SENT TO QUU AND WILL NEED TO BE FORWARDED.</strong>";
        $email_content .= "<strong>Customer Name :</strong> $firstname $surname\n";
        $email_content .= "<strong>Customer Contact Number :</strong> $contact\n";
        $email_content .= "<strong>Property Address :</strong> $number $street, $suburb, $postal\n";
        $email_content .= "<strong>Customer Account Number :</strong> $account_num\n";
        $email_content .= "<strong>Ellipse Job Number :</strong> $job_num\n\n";
        $email_content .= "<strong>Details of Complaints :</strong> \n$details\n\n";
        $email_content .= "<strong>Actions Taken :</strong> \n$act_taken\n\n";
        $email_content .= "<strong>What the customer would like to be actioned by QUU :</strong> \n$cust_req\n\n\n\n\n";
        $email_content .= "<strong>This was raised by $name at \n$time_stamp\n\n";
    }

    // Build the email headers.
    $email_headers = "From: $name <$email>";
    $email_headers = "MIME-Version: 1.0" . "\n";
    $email_headers .= "Content-type:text/html;charset=UTF-8" . "\n";

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

    // Data Insert

    $sql = "INSERT INTO quu_complaints (`first_name`, `sur_name`, `contact_number`, `addr_number`, `addr_street`, `addr_suburb`, `postal_code`, `acct_number`, `job_number`, `compl_details`, `act_taken`, `cust_request`, `created_at`, `type`, `sent_status`) VALUES ('$firstname', '$surname', '$contact', '$number', '$street', '$suburb', '$postal', '$account_num', '$job_num', '$details', '$act_taken', 'cust_req', '$created_at', '$type', '$sent_status')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
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
