<?php
///////////////////////////////
////  TEST POST DATA HERE  ////
///////////////////////////////

include_once('db_connect.php');

$script_list = $_POST['script_list'];

if(!empty($script_list)) {

    $sql = "SELECT * FROM quu_script_list WHERE category_id = " . key($script_list);
    $result = $conn->query($sql);

    foreach ($script_list as $key => $value) {}

    $email_content = '<!DOCTYPE html><html><title>Initial Screen</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><body>';

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {    

        	//echo $value->0;                  

            //$email_content .= '<p><input class="w3-check" type="checkbox" value="'.$row['category_num'].'" ' . (!in_array($row['category_num'], $value) ?: 'checked') . ' disabled><label> '.$row['category_list'].'</label></p>';
        }
    }

    echo implode(', ', array_values($value));

    //echo $email_content;
    // $conn->close();
}
?>