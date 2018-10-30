<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connect.php');

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

	$_POST['agent_name'] = $agent = $_SESSION['agent'];
    $_POST['phone'] = $phone = $_SESSION['phone'];
    $_POST['epoch'] = $epoch = date("Y-m-d H:i:s", $_SESSION['epoch']);

    // Staff OB
    if(isset($_POST['staff'])){
        $_POST['staff'] = $staff = $_POST['staff'];
    } elseif(isset($_GET['staff'])) {
        $_POST['staff'] = $staff = $_GET['staff'];
    }

    // Creating POST variable and assign value
    // alternative : extract($array);
    if(isset($_POST)) {
        foreach($_POST as $key=>$value) {
            $$key = $value;
        }
    }

    if($form_type == 'new_ticket') {
    	$_POST['created_at'] = $created_at = date("Y-m-d H:i:s");
    	$exclude = array("campaign", "action", "updated_at");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);
    } elseif ($form_type == 'update_ticket') {
    	// $sql = 'UPDATE ' . $campaign . '_log SET '
    	$_POST['updated_at'] = $updated_at = date("Y-m-d H:i:s");
    	$exclude = array("campaign", "action", "created_at");
    	$sql = update_array($campaign . "_log", $_POST, $_POST['ticket_number'], $exclude);
    } elseif ($form_type == 'other') {
        $_POST['created_at'] = $created_at = date("Y-m-d H:i:s");
        $exclude = array("campaign", "action", "updated_at");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);
    } elseif ($form_type == 'no_ticket') {
        $_POST['created_at'] = $created_at = date("Y-m-d H:i:s");
        $exclude = array("campaign", "action", "updated_at");
        $sql = insert_array($campaign . "_log", $_POST, $exclude);
    } else {
    	echo "<h1>Error in QUERY ! <br> Please contact Development Engineer ASAP.</h1>";
    }


    if ($conn->query($sql) === TRUE) {
        if($form_type == 'other') {
            echo "New record created successfully. <br>STAFF CONTACT NUMBER is successfully COPIED in the clipboard!";
        } else if ($form_type == 'no_ticket') {
            echo "New record created successfully. You can manually CLOSE this window.";
        } else {
            echo "New record created successfully. You can manually CLOSE this window.";
        }
        
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

function update_array($table, $data, $condition, $exclude = array()) {
    $columns = $values = array();

    if( !is_array($exclude) ) $exclude = array($exclude);

    foreach($data as $key => $value) {
        if( !in_array($key, $exclude) ) {
            if(!is_array($value)) {
                $columns[] = "`$key` = '" . $value . "'";
            } else {
                $columns[] = "`$key`";
                $new = "";
                foreach ($value as $key => $value) {
                    $new .= $value . ". ";
                }

                $values[] = "'" . $new . "'";
            }
        }
    }
    $columns = implode(",", $columns);

    return "UPDATE `$table` SET $columns WHERE `ticket_number` = '$condition'";
}

?>