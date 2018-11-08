<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch']) && isset($_GET['did_extension'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
  $_SESSION["epoch"] = $_GET['epoch'];
  $_SESSION["did_extension"] = $_GET['did_extension'];
} else {
  $_SESSION["agent"] = 'N/A';
  $_SESSION["phone"] = 'N/A';
  $_SESSION["epoch"] = 0000000001;
}

$page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Initial Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include_once('../assets/style.html'); ?>
<style>
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
  .w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php require('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>JLR IN CONTROL EMERGENCY BCP NOTES</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <form class="no-js" action="confirmation.php" method="POST" target="_self" style="margin-top: 50px;">
      <input class="w3-hide" type="hidden" name="form_type" value="log">
      <input class="w3-hide" type="hidden" name="campaign" value="jlr">

      <p class="w3-text-red">In Control <?php switch(isset($_GET['did_extension'])) { case '61870791713': echo "Secure"; break; case '61870791714': echo "Emergency Assistance"; break; default: echo "N/A"; break; } ?>, how can I help you?</p>
      <p class="w3-text-blue">DNIS : 882396 <?php echo $_GET['did_extension']?></p>

      <div class="w3-row">
        <div class="w3-half">
          <button type="submit" name="job_type" value="0" class="w3-button w3-padding-32 w3-yellow w3-margin-bottom" style="width: 70%">Accident or Emergency Services</button>
        </div>
        <div class="w3-half">
          <button type="submit" name="job_type" value="1" class="w3-button w3-padding-32 w3-orange w3-margin-bottom" style="width: 70%">Stolen Vehicle</button>
        </div>
      </div>

      <p class="w3-text-red">If the call does not relate to SVT or Accident, enter a brief description of the reason for call below (including accidental button push)</p>
      <div class="w3-row" style="margin:30px auto;">
        <input class="w3-input w3-border" type="text" name="reason" placeholder="" style="width:80%">
      </div>


      <h2 class="w3-text-green">Non SVT or Emergency FAQs</h2>
      <p class="w3-text-purple">Accidental Button Push</p>
      <p class="w3-text-red">Ask the caller to confirm their PIN before disconnecting the call.</p>
      <p class="w3-text-purple">Roadside Assist</p>
      <p class="w3-text-red">Advise the caller that they have called the emergency line and that we are unable to assist them or transfer their call. They will need to press the left hand side button on their head set to be connected through to road side assist.</p>
      <p class="w3-text-purple">Vehicle Functionality Queries</p>
      <p class="w3-text-red">Refer them to their dealer.</p>

      <!-- <div class="w3-row">
        <div class="w3-container">
          <button type="submit" style="width: 30%;margin: 0 auto;display: block;" class="w3-button w3-block w3-padding-24 w3-text-green w3-margin-bottom w3-card">Continue</button>
        </div>
        <p></p>
      </div> -->

    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
