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

// $page_js = false;

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
    <h1 class="w3-jumbo"><b>Defence Housing Australia</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <form action="../php/logCall.php" method="POST" style="margin-top: 50px;">
      <input class="w3-hide" type="hidden" name="form_type" value="log">
      <input class="w3-hide" type="hidden" name="campaign" value="dha">
      <p class="w3-text-blue">Defence Housing Australia after hours emergency repairs and maintenance service, may I start with the address of the property this call relates to?</p>
      <p class="w3-text-red"><i>Ask caller if they are contacting us regarding an existing issue, e.g. a job that we have already logged. </i></p>
      <div class="w3-row">
        <div class="w3-quarter"><p class="w3-text-blue">May I please have:</p></div>
      </div>
      <div class="w3-row">
        <div class="w3-container">
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Is this job is regarding to?: </p></div>
            <div class="w3-half">
              <select id="job_type" class="w3-select w3-border" name="job_type">
                <option selected="" disabled="disabled"></option>
                <option value="New Issue">New Issue</option>
                <option value="Existing Issue">Existing Issue</option>
              </select>
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Full Name: </p></div>
            <div class="w3-half">
              <input type="text" name="name" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Contact Phone Number : </p></div>
            <div class="w3-half">
              <input type="text" name="contact_number" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Address: </p></div>
            <div class="w3-half">
              <input type="text" name="address" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Suburb: </p></div>
            <div class="w3-half">
              <input type="text" name="suburb" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">State: </p></div>
            <div class="w3-half">
              <input type="text" name="state" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Postcode: </p></div>
            <div class="w3-half">
              <input type="text" name="postal_code" class="w3-input w3-border">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Details of Maintenance issue: </p></div>
            <div class="w3-half">
              <textarea name="details" class="w3-input w3-border"></textarea>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Does this call relate to?: </p></div>
            <div class="w3-half">
              <select id="call_relation" class="w3-select w3-border" name="call_relation">
                <option selected="" disabled="disabled"></option>
                <option value="Emergency Maintenance">Emergency Maintenance</option>
                <option value="All Other Calls">All Other Calls</option>
                <option value="Emergency Accommodation">Emergency Accommodation</option>
              </select>
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-container">
              <button type="submit" style="width: 30%;margin: 0 auto;display: block;" class="w3-button w3-block w3-padding-24 w3-text-green w3-margin-bottom w3-card">Log</button>
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
