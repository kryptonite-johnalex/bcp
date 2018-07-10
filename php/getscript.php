<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$script = $_GET['script'];

$sql = "SELECT * FROM quu_script_list WHERE category_id = $script";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
    	// This is my first option, but can load up db, so just assign number instead
    	//echo '<p><input class="w3-check" type="checkbox" name="script_list[]" value="'.$row['category_list'].'"><label> '.$row['category_list'].'</label></p>';

    	echo '<p><input class="w3-check" type="checkbox" name="script_list['.$script.'][]" value="'.$row['category_num'].'"><label> '.$row['category_list'].'</label></p>';
	}
}

?>