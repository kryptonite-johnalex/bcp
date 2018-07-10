<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('php/db_connect.php');

$script = $_GET['script'];

$sql = "SELECT * FROM quu_script_list WHERE category_id = $script";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	//var_dump($row['category_list'])
    	echo '<p><input class="w3-check" type="checkbox"><label> '.$row['category_list'].'</label></p>';
	}
}

?>