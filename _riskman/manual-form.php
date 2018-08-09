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
<title>Manual Form</title>
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
    <h1 class="w3-jumbo"><b>Manual Form</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div class="w3-container">
      <h2 class="w3-text-red">**** DO NOT do a manual Riskman unless your Team Leader has expressly told you to do one. ****</h2>
      <div style="margin-top: 150px;">
        <div style="margin: 100px auto;">
          <p class="w3-text-purple">If your Team Leader has NOT told you to do a Manual Riskman, click the back button to retun the previous screen and do a normal Riskman.</p>
          <div class="w3-container w3-center" style="margin-top: 100px">
            <button type="button" style="width: 200px" onclick="window.location.href = '/_riskman/index.php'" class="w3-button w3-padding-large w3-pale-blue w3-text-purple w3-margin-bottom w3-card">Back</button>
          </div>
        </div>
        <div style="margin: 100px auto;">
          <p class="w3-text-purple">If your Team Leader has told you to do a Manual Riskman, click the button below to do a Manual Riskman.</p>
          <div class="w3-container w3-center" style="margin-top: 100px">
              <button type="button" style="width: 200px" onclick="window.location.href = 'https://bit.ly/2AjqxDM'" class="w3-button w3-padding-large w3-light-gray w3-text-purple w3-margin-bottom w3-card">Manual Form</button>
          </div>
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
