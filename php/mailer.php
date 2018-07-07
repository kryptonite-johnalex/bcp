<?php
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
        $subject = "New contact from $name";

        // Filtering form type
        if($type = 'escalation') {

            // Defining variables
            $name = 'TEST';
            $email = 'ladrajohnalex@gmail.com';

            $incident_num = $_POST['incident_num'];
            $wrap_code = $_POST['wrap_code'];
            $street = $_POST['street'];
            $reason = $_POST['reason'];

            // Build the email content.
            $email_content = "QUU Incident Number: $incident_num\n";
            $email_content = "QUU Wrap Code: $wrap_code\n";
            $email_content .= "Street and Suburb: $street\n\n";
            $email_content .= "Reasons:\n$reason\n";
        }

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
