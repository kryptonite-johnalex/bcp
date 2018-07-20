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
    // Get the form fields and remove whitespace.
    // $name = strip_tags(trim($_POST["name"]));
    //         $name = str_replace(array("\r","<br>"),array(" "," "),$name);
    // $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    // $message = trim($_POST["message"]);

    $type = strip_tags(trim($_POST["form_type"]));
    $frequent_query = $_POST['frequentquery'];
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
    $recipient = "johnalexladra@gmail.com"; // Full Stack Developer
    //$recipient = "marveelou@gmail.com,info@homelottery.com.au;blendedtl@contact121.com.au;emily.bill@contact121.com.au";

    // Set the email subject.
    $subject = "HRF Escalation Email - " . $frequent_query;

    // Filtering form type
    //($type == 'escalation') {

        // Defining variables
        $name = 'Service'; // this will be change to the agent who took the call
        $email = 'service@contact121.com.au';
        $time_stamp = date("h:i:s"); // this will be change to the time when the call took

        $agent = $_SESSION['agent'];
        $phone = $_SESSION['phone'];

        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $contact_method = $_POST['contactmethod'];
        $additional_info = $_POST['additionalinfo'];

        $created_at = date("Y-m-d H:i:s");

        // Build the email content.
        $email_content = "<strong style='color: blue;'>Caller Details</strong><br><br>";
        // $email_content .= "QUU Incident Number: $incident_num<br>";
        // $email_content .= "QUU Wrap Code: $wrap_code<br>";
        $email_content .= "Name: $first_name $last_name <br><br>";
        $email_content .= "Contact No: $contact <br><br>";

        $email_content .= "Daytime: (need further adjustments) <br>";
        $email_content .= "Evening: (need further adjustments) <br><br>";

        $email_content .= "Email: $email <br><br>";
        $email_content .= "Preferred Contact Method: $contact_method<br><br>";
        $email_content .= "<strong style='color: blue;'>Additional Details</strong><br><br>";
        $email_content .= "$additional_info";
    //}

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

    // Data Insert

    $sql = "INSERT INTO al_escalation (`agent_name`, `phone`, `first_name`, `last_name`, `contact`, `email`, `contact_method`, `frequent_query`, `additional_info`, `created_at`, `sent_status`) VALUES ('$agent', '$phone', '$first_name', '$last_name', '$contact', '$email', '$contact_method', '$frequent_query', '$additional_info', '$created_at', '$sent_status')";

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