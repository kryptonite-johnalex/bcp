<?php
    // My modifications to mailer script
    // Added input sanitizing to prevent injection

include_once('db_connect.php');

$script_list = $_POST['script_list'];
$sent_status = 0;

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($script_list)) {

        $sql = "SELECT * FROM quu_script_list WHERE category_id = " . key($script_list);
        $result = $conn->query($sql);

        foreach ($script_list as $key => $value) {}

        $email_content = '<!DOCTYPE html><html><title>Initial Screen</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><body>';

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {                      

                $email_content .= '<p><input class="w3-check" type="checkbox" value="'.$row['category_num'].'" ' . (!in_array($row['category_num'], $value) ?: 'checked') . ' disabled><label> '.$row['category_list'].'</label></p>';
            }
        }

        // $conn->close();
    }


    echo $email_content;

    $recipient = "marveelou@gmail.com,quu@contact121.com.au,blendedtl@contact121.com.au,overnight@contact121.com.au";

    // Set the email subject.
    $subject = "Note Script";

    // Defining variables
    $name = 'Service';
    $email = 'service@contact121.com.au';
    $created_at = date("Y-m-d H:i:s");

    // Build the email content.
    // $email_content .= "QUU Incident Number: $incident_num\n";
    // $email_content .= "QUU Wrap Code: $wrap_code\n";
    // $email_content .= "Street and Suburb: $street\n\n";
    // $email_content .= "Reasons:\n$reason\n";

    $email_content .= '</body></html>';

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

    $a = key($script_list);
    $b = implode(', ', array_values($value));

    $sql = "INSERT INTO quu_record_script (`script`, `script_list`, `created_at`, `sent_status`) VALUES ('$a', '$b', '$created_at', '$sent_status')";

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
