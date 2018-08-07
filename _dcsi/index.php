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
    <h1 class="w3-jumbo"><b>DCSI</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-tl.php'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Send Email To TL</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-am.php'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Send Email To Appliance Mgmt</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-ccb.php'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Multiple Reminder/Warranty CCBs</button>
      </div>
    </div>
    <div class="w3-container">
      <textarea class="w3-input w3-border" name="details" required=""></textarea>
    </div>
    <p>Welcome to Housing SA Maintenance. My name is <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?>. May I have you address please? </p>
    <p class="w3-text-blue">Please may I take your name and telephone number?</p>
    <div class="w3-row">
      <div class="w3-container w3-third">
        <select class="w3-select w3-border" name="option">
        </select>
        <p></p>
        <button type="button" onclick="window.location.href = '/_dcsi/call-log.php?details='+ document.getElementsByTagName('textarea')[0].value" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-text-green w3-card">Continue</button>
        <p class="w3-text-red">If call relates to Fire, Injury or Property Damage you must refer to the Insurance information</p>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '#'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Location Codes</button>
        <button type="button" onclick="window.location.href = '#'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">Insurance Info</button>
      </div>
      <div class="w3-container w3-third">
      </div>
    </div>
  </div>

  <div class="w3-container w3-cyan" id="options" style="margin-top:75px">
    <p class="w3-center">The 'Dial Now' buttons below are to be used during business hours only</p>
    <div class="w3-row">
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:1300135701'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">Doherty’s – 1300 135 701</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:1300784462'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">PFM – 1300 784 462</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:86230400'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">TMD – 8623 0400</button>
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:0448352476'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">Bettios – 0448 352 476</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '#'" class="w3-btn w3-block w3-padding-24 w3-cyan w3-margin-bottom w3-hover-cyan " disabled> </button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:0448349329'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">TMD – 0448 349 329</button>
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:86861000'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">RTC - 8686 1000</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '#'" class="w3-btn w3-block w3-padding-24 w3-cyan w3-margin-bottom w3-hover-cyan" disabled> </button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '#'" class="w3-btn w3-block w3-padding-24 w3-cyan w3-margin-bottom w3-hover-cyan" disabled> </button>
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = '#'" class="w3-btn w3-block w3-padding-24 w3-cyan w3-margin-bottom w3-hover-cyan" disabled> </button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:81686019'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">PFM South – 8168 6019</button>
      </div>
      <div class="w3-container w3-third">
        <button type="button" onclick="window.location.href = 'tel:81686020'" class="w3-button w3-block w3-padding-24 w3-light-gray w3-margin-bottom w3-card">PDM East – 8168 6020</button>
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
