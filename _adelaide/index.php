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
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:1;cursor:pointer}
  .w3-half img:hover{opacity:0.8}
</style>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php require('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin:40px 40px 0 340px">
  <div class="w3-container w3-margin-top">
    <div class="w3-quarter">
      <p></p>
      <!-- <button type="button" onclick="window.location.href = '/_adelaide/'" class="w3-button w3-block w3-card w3-padding-32 w3-cyan">Stop Recording</button> -->
    </div>
    <div class="w3-half">
      <img src="../assets/images/HRHLLogo.jpg" alt="logo" style="width: 100%;">
    </div>
    <div class="w3-quarter">
      <p></p>
      <!-- <button type="button" onclick="window.location.href = '/_adelaide/'" class="w3-button w3-block w3-card w3-padding-32 w3-light-gray">Testing - Ignore</button> -->
    </div>
  </div>
  <!-- Header -->
    <div class="w3-container" id="top">
      
      <h1 class="w3-jumbo w3-text-pink w3-center"><b>THIS IS ADELAIDE</b></h1>
      <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
      <p class="w3-text-blue">Thank you for calling The Hospital Home Lottery, <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?> speaking. Would you like to order a ticket?</p>
    </div>

  <div class="w3-container" id="options" style="margin-top:20px">
    <div class="row">
      <div class="w3-half w3-padding">
        <button type="button" onclick="window.location.href = '/_adelaide/order.php'" class="w3-button w3-block w3-padding-32 w3-light-green w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">Order Ticket</h2></button>
        <button type="button" onclick="window.location.href = '/_adelaide/faq.php'" class="w3-button w3-block w3-padding-32 w3-pale-red w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">FAQ</h2></button>
      </div>
      <div class="w3-half w3-padding">
        <button type="button" onclick="window.location.href = '/_adelaide/'" class="w3-btn w3-block w3-padding-32 w3-aqua w3-margin-bottom" disabled style="opacity: 1;"><strong>Log-in Details for Order Page</strong><br> Username: callcentre<br>Password: soa2018</button>
        <button type="button" onclick="window.location.href = '/_adelaide/escalation.php'" class="w3-button w3-block w3-padding-32 w3-yellow w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">Escalation</h2></button>
      </div>
    </div>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
