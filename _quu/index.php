<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
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
      <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
      <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
      <hr style="width:50px;border: 5px solid red" class="w3-round">
      <p>Thank you for calling Queensland Urban Utilities, my name is <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?>, how may I help you?</p>
      <p>Reminder - Refer to UKS On All Calls!</p>
      <p>If you are on hold to seniors for over one minute, hang up and use the email button to send an email instead.</p>
      <p>If caller is unknown or does not wish to be identified, requestor details should be anon.
      <p>Orders - BW Status - Remember that you need to check both of the boxes that appear when you set a BW for it to write to the system properly.</p>
      <p>Validating Addresses - DO NOT create or ignore when checking addresses. Refer advice on handout.</p>
      <p>Seniors Line - Always have the name and telephone number of the person you are transferring.</p>
      <p>Requestor Tab - Remember to Always Save at this screen. Refer advice on handout.</p>
    </div>

  <div class="w3-container" id="options" style="margin-top:75px">
    <button type="button" onclick="window.location.href = '/_quu/note-script.php'" class="w3-button w3-block w3-padding-24 w3-red w3-margin-bottom">No Water, Sudden Drop in Pressure, Burst Main, Dirty Water</button>
    <button type="button" onclick="window.location.href = '/_quu/escalation.php'" class="w3-button w3-block w3-padding-24 w3-orange w3-margin-bottom">All Other A1 and A2 Jobs That Needs to be Logged</button>
    <div class="w3-row">
      <div class="w3-half">
        <button type="button" onclick="window.location.href = '/_quu/escalation.php'" class="w3-button w3-block w3-padding-32 w3-yellow w3-margin-bottom">All Other Calls</button>
      </div>
      <div class="w3-rest w3-quarter"><p></p></div>
      <div class="w3-quarter">
        <button type="button" onclick="window.location.href = '/_quu/senior.php'" class="w3-button w3-block w3-padding-32 w3-green w3-margin-bottom">Send Senior Email</button>
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
