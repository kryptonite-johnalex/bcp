<?php
session_start();

if(isset($_GET['fullname']) && isset($_GET['fullname'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['fullname'];
  $_SESSION["phone"] = $_GET['phone'];
}

?>
<!DOCTYPE html>
<html>
<title>TL Escalation</title>
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
    <h1 class="w3-jumbo"><b>TL Escalation</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <div class="w3-container" id="senior" style="margin-top:75px">
      <p class="w3-text-red">Enter message to send to Team Leader below; (400 Chars over 2 lines Max)</p>
      <form class="dcsiForm" action="../php/sendEscalation.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="escalation">
        <input class="w3-hide" type="hidden" name="campaign" value="dcsi">
        <input class="w3-hide" type="hidden" name="escalation_type" value="tl">
        <div class="w3-row-padding w3-margin-bottom">
          <input class="w3-input w3-border w3-margin-bottom" type="text" name="message[]" required="" placeholder="">
          <input class="w3-input w3-border w3-margin-bottom" type="text" name="message[]" required="" placeholder="">
        </div>
        <div class="w3-row">
          <div class="w3-container w3-center">
            <button type="submit" class="w3-button w3-padding-24 w3-margin-bottom w3-card">Send Email And Go Back To Original Screen</button>
          </div>
        </div>
      </form>
    </div>

    <div class="w3-container" id="options" style="margin-top:75px">
      <div class="w3-row">
        <div class="w3-container w3-half">
        </div>
        <div class="w3-container w3-half">
          <button type="button" onclick="window.location.href = '/_dcsi/index.php'" class="w3-button w3-right w3-padding-large w3-margin-bottom w3-card">Back (No Email)</button>
        </div>
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
