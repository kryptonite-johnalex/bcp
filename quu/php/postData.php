<?php

if(!empty($_POST['script_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['script_list'] as $selected){
echo $selected."</br>";
}
}

?>