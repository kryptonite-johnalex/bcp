<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
  $_SESSION["epoch"] = $_GET['epoch'];
  $_SESSION["did_extension"] = $_GET['did_extension'];
} else {
  $_SESSION["agent"] = 'C223';
  $_SESSION["phone"] = '5654534';
  $_SESSION["epoch"] = 1536710194;
  $_SESSION["did_extension"] = "61870791760";
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
  <!-- Header -->
    <div class="w3-container" id="top" style="margin-top: 100px;">
      <img src="../assets/images/ccnaLogo.jpg" style="width: auto; vertical-align: middle; max-height: 115px; max-width: 100%; margin: 10px;">
    </div>

    <div class="w3-container">
      <p class="w3-text-indigo">Welcome to CCNA Support Help Desk, my name is <?php echo $_SESSION['agent']; ?>. How can I help you today?</p>
    </div>

    <div class="w3-container" style="margin-top: 20px;">
      <div class="w3-row">
        <div class="w3-col w3-padding w3-half"><button onclick="window.location.href='/_ccna/ticket.php?type=new'" class="w3-button w3-block w3-pink w3-padding-32" style="float: none; margin: 0 auto">Raise New Ticket</button></div>
        <div class="w3-col w3-padding w3-half"><button onclick="window.location.href='/_ccna/ticket.php?type=update'" class="w3-button w3-block w3-purple w3-padding-32" style="float: none; margin: 0 auto">Update Existing Ticket</button></div>
        <div class="w3-col w3-padding" style="margin: 30px auto;"><button onclick="window.location.href='/_ccna/other.php'" class="w3-button w3-block w3-orange w3-padding-32 w3-half" style="float: none; margin: 0 auto">Other</button></div>
        <div class="w3-col w3-padding"><button onclick="window.location.href='/_ccna/noticket.php'" class="w3-button w3-block w3-green w3-padding-32 w3-half" style="float: none; margin: 0 auto">No ticket Required To Be Raised</button></div>
      </div>
    </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
