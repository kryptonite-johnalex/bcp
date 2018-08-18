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
<title>Call Log</title>
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

    <form action="../php/logCall.php" method="POST" style="margin-top: 50px;">
      <input class="w3-hide" type="hidden" name="form_type" value="log">
      <input class="w3-hide" type="hidden" name="campaign" value="toyota">
      <input class="w3-hide" type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
      <input class="w3-hide" type="hidden" name="company" value="<?php echo $_POST['company'] ?>">
      <input class="w3-hide" type="hidden" name="dealer_code" value="<?php echo $_POST['dealer_code'] ?>">
      <input class="w3-hide" type="hidden" name="sap_id" value="<?php echo $_POST['sap_id'] ?>">
      <p class="w3-text-blue">Welcome to the Toyota Fleet Contact Centre this is <?php echo (isset($_SESSION["agent"])) ?: '[Agent Name]'; ?> speaking, how may I help you? </p>
      <p class="w3-text-red"><i>Please determine the nature of the call and then access relevant UKS entry in the Toyota Fleet Community and follow the correct procedure.</i></p>
      <div class="w3-row">
        <div class="w3-quarter"><p class="w3-text-blue">May I please have:</p></div>
      </div>
      <div class="w3-row">
        <div class="w3-container">
          <div class="w3-row">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Call Source: </p></div>
            <div class="w3-half">
              <select id="call_source" class="w3-select w3-border" name="call_source">
                <option selected="" disabled="disabled"></option>
                <option value="Dealer">Dealer</option>
                <option value="Fleet Customer">Fleet Customer</option>
                <option value="HO Staff">HO Staff</option>
                <option value="Regional Staff Member">Regional Staff Member</option>
                <option value="Existing Fleet Customer">Existing Fleet Customer</option>
                <option value="New Fleet Customer">New Fleet Customer</option>
                <option value="Potential Fleet Customer">Potential Fleet Customer</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Call Type: </p></div>
            <div class="w3-half">
              <select id="call_type" class="w3-select w3-border" name="call_type">
                <option selected="" disabled="disabled"></option>
                <option value="SAPID Query">SAPID Query</option>
                <option value="myFleet Assistance Required">myFleet Assistance Required</option>
                <option value="Fleet Registration Enquiry">Fleet Registration Enquiry</option>
                <option value="Fleet Re-Registration Enquiry">Fleet Re-Registration Enquiry</option>
                <option value="Fleet Archive Enquiry">Fleet Archive Enquiry</option>
                <option value="Fleet Pricing">Fleet Pricing</option>
                <option value="Dealer Bulletin">Dealer Bulletin</option>
                <option value="Pricing & Product Information">Pricing & Product Information</option>
                <option value="Vehicle Enquiry">Vehicle Enquiry</option>
                <option value="Change of Information">Change of Information</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Caller Resolution: </p></div>
            <div class="w3-half">
              <select id="call_resolution" class="w3-select w3-border" name="call_resolution">
                <option selected="" disabled="disabled"></option>
                <option value="Call Will Call Back">Call Will Call Back</option>
                <option value="Email Sent For Return Call">Email Sent For Return Call</option>
                <option value="Escalated to TMCA HO">Escalated to TMCA HO</option>
                <option value="Escalated to TMCA National Fleet Manager">Escalated to TMCA National Fleet Manager</option>
                <option value="Escalated to TMCA Regional Fleet Manager">Escalated to TMCA Regional Fleet Manager</option>
                <option value="Resolved by TFCC Agent">Resolved by TFCC Agent</option>
                <option value="Follow Up Call Required">Follow Up Call Required</option>
                <option value="Escalated to TMCA">Escalated to TMCA</option>
                <option value="Referral to Dealer">Referral to Dealer</option>
                <option value="Transfer to Dealer">Transfer to Dealer</option>
                <option value="Refer to Regional Manager">Refer to Regional Manager</option>
              </select>
            </div>
          </div>
          <div class="w3-row w3-section">
            <div class="w3-col s3"><p class="w3-right w3-margin-right w3-text-blue">Note: </p></div>
            <div class="w3-half">
              <input type="text" name="note[]" class="w3-input w3-block w3-border w3-section"> 
              <input type="text" name="note[]" class="w3-input w3-block w3-border w3-section"> 
              <input type="text" name="note[]" class="w3-input w3-block w3-border w3-section"> 
              <input type="text" name="note[]" class="w3-input w3-block w3-border w3-section"> 
            </div>
          </div>
          <div class="w3-row">
            <div class="w3-container">
              <button type="submit" style="width: 30%;margin: 0 auto;display: block;" class="w3-button w3-block w3-padding-24 w3-text-green w3-margin-bottom w3-card">Log</button>
            </div>
            <div class="w3-container">
              <button type="submit" style="width: 30%;margin: 0 auto;display: block;" onclick="window.history.back()" class="w3-button w3-block w3-right w3-padding-24 w3-margin-bottom w3-card">Back</button>
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
