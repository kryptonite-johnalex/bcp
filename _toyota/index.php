<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
  $_SESSION["epoch"] = $_GET['epoch'];
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
    <h1 class="w3-jumbo"><b>Toyota Fleet Inbound</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <form class="no-js" action="call-log.php" method="POST" target="_self" style="margin-top: 50px;">
      <input class="w3-hide" type="hidden" name="form_type" value="log">
      <input class="w3-hide" type="hidden" name="campaign" value="toyota">
      <p class="w3-text-blue">Welcome to the Toyota Fleet Contact Centre this is <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?> speaking, how may I help you? </p>
      <p class="w3-text-red"><i>Please determine the nature of the call and then access relevant UKS entry in the Toyota Fleet Community and follow the correct procedure.</i></p>
      <div class="w3-row">
        <div class="w3-quarter"><p class="w3-text-blue">May I please have:</p></div>
      </div>
      <div class="w3-row">
        <div class="w3-container">
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Your Name: </p></div>
            <div class="w3-half">
              <input type="text" name="name" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Your Company/Dealer Name: </p></div>
            <div class="w3-half">
              <input type="text" name="company" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Dealer Code: </p></div>
            <div class="w3-half">
              <input type="text" name="dealer_code" class="w3-input w3-border w3-half"> <span class="w3-text-purple"><i style="display: inline-block; margin: 10px 16px;">(if applicable)</i></span>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Your SAP ID: </p></div>
            <div class="w3-half">
              <input type="text" name="sap_id" class="w3-input w3-border w3-half"> <span class="w3-text-purple"><i style="display: inline-block; margin: 10px 16px;">(if applicable)</i></span>
            </div>
          </div>
          <p class="w3-text-red"><i>Access customer details in myFleet.</i></p>
          <div class="w3-row w3-section">
            <p class="w3-text-blue">Whilst I have you on the phone may I confirm that all the details in our system are correct?</p>
            <p class="w3-text-red"><i>Check all details in myFleet e.g. contact names, email addresses, contact numbers etc.<span class="w3-text-purple"> (if applicable)</span></i></p>
          </div>
          <p class="w3-text-blue">Is there anything else I can help you with today?</p>
          <p class="w3-text-blue">Thank you for your call, goodbye.</p>
          <div class="w3-row">
            <div class="w3-container">
              <button type="submit" style="width: 30%;margin: 0 auto;display: block;" class="w3-button w3-block w3-padding-24 w3-text-green w3-margin-bottom w3-card">Continue</button>
            </div>
            <p></p>
          </div>
        </div>
      </div>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
</body>
</html>
