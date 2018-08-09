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
    <h1 class="w3-jumbo"><b>Riskman Disability Services Hotline</b></h1>
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
      <input class="w3-hide" type="hidden" name="campaign" value="riskman">
      <p class="w3-text-blue">Disability Services Hotline <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?> speaking </p>
      <p class="w3-text-red w3-margin-left">If caller advises they do not wish the call to be recorded please switch off the recording. <button type="button" onclick="window.location.href = '#'" class="w3-button w3-text-red w3-light-gray w3-margin-bottom w3-card w3-right">Stop Recording</button></p>
      <div class="w3-row w3-section">
        <div class="w3-quarter"><p class="w3-text-blue">Do you work for Disability Service</p></div>
        <div class="w3-quarter">
          <select id="disableService" class="w3-select w3-border" name="option" onchange="disabilityService('disableService')">
            <option selected="" disabled="disabled"></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="w3-quarter w3-rest">
          <p></p>
        </div>
        <div class="w3-quarter">
          <button type="button" onclick="window.location.href = '/_riskman/manual-form.php'" class="w3-button w3-block w3-padding-24 w3-text-purple w3-light-gray w3-margin-bottom w3-margin-top w3-card w3-right">Manual Form</button>
        </div>
        <div class="w3-third">
          <p id="optionYesdiv" style="display: none" class="w3-text-blue">Has your supervisor been notified
          <select id="optionYes" class="w3-select w3-border" name="optionYes" onchange="disabilityService('optionYes')" disabled="">
            <option selected="" disabled="disabled"></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
          </p>

          <p id="optionNodiv" style="display: none" class="w3-text-blue">Are you working for Disability Service today?
          <select id="optionNo" class="w3-select w3-border" name="optionNo" onchange="disabilityService('optionNo')" disabled="">
            <option selected="" disabled="disabled"></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>

          </p>
        </div>
        <div id="optionMsg" class="w3-col">
          <p class="w3-text-red"></p>
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-container w3-light-gray">
          <p class="w3-text-red">Log Call:</p>
          <div class="w3-row w3-section">
            <div class="w3-col s2"><p class="w3-right w3-margin-right">Caller Type: </p></div>
            <div class="w3-quarter">
              <select id="disableService" class="w3-select w3-border" name="caller_type" onchange="disabilityService('disableService')">
                <option selected="" disabled="disabled"></option>
                <option value="Staff">Staff</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s2"><p class="w3-right w3-margin-right">Incident Report: </p></div>
            <div class="w3-quarter">
              <select id="disableService" class="w3-select w3-border" name="incident_report" onchange="disabilityService('disableService')">
                <option selected="" disabled="disabled"></option>
                <option value="No Recorded">None Recorded</option>
                <option value="Incomplete Report">Incomplete Report</option>
                <option value="Incident Report">Incident Report</option>
                <option value="Multiple Incident Report">Multiple Incident Report</option>
                <option value="Group Report">Group Report</option>
              </select>
            </div>
          </div>
          <p class="w3-text-red">Please take care to select the correct incident type. A multiple report is when a caller logs multiple separate incidents, a group report is when there is more than 1 report that relates to the same issue.</p>
          <div class="w3-row w3-section">
            <div class="w3-col s2"><p class="w3-right w3-margin-right">Report Number(s): </p></div>
            <div class="w3-half">
              <input type="number" class="w3-input w3-border" name="report_num" min="0" max="100">
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-container">
              <button type="submit" style="width: 50%;margin: 0 auto;display: block;" class="w3-button w3-block w3-padding-24 w3-text-green w3-margin-bottom w3-card">Click to Terminate Call</button>
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
