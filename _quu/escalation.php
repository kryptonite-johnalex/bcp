<!DOCTYPE html>
<html>
<title>Escalation Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once('../assets/style.html'); ?>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php include_once('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Loader/Spinner -->
<div class="loading"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Escalation Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" id="escalation" style="margin-top:75px">
    <p>Enter the details of this calls into the QUU Citrix. Copy and paster the Incident Number and KIT wrap code into the relevant boxes
    at the end of the call.</p>
    <form action="../php/sendEscalation.php" method="POST">
      <input class="w3-hide" type="text" name="form_type" value="escalation">
      <input class="w3-hide" type="text" name="campaign" value="queensland">
      <div class="w3-section">
        <label>QUU Incident Number</label>
        <input class="w3-input w3-border" type="text" name="incident_num" required="" placeholder="0000">
      </div>
      <p>If the call was about an already existing incident adn not reporting a new one, please enter the original incident number.</p>
      <div class="w3-section">
        <label>QUU Wrap Code</label>
        <input class="w3-input w3-border" type="text" name="wrap_code" required="" placeholder="NA">
      </div>
      <div class="w3-row">
        <div class="w3-half">
          <button type="button" onclick="window.location.href = '/_quu/complaints.php'" class="w3-button w3-block w3-padding-32 w3-pale-green w3-margin-bottom">Complaints</button>
        </div>
        <div class="w3-half" style="padding-left: 215px;">
          <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-32 w3-red w3-margin-bottom">Back</button>
        </div>
      </div>
      <p>For each A1 (no water, water pressurem burst main etc). You must enter the area (street and suburb) and the reason why
      you are raising the A1. Press the Email button to alert Joan.</p>
      <div class="w3-section">
        <label>Street and Suburb</label>
        <input class="w3-input w3-border" type="text" name="street" required="">
      </div>
      <div class="w3-section">
        <label>Reasons</label>
        <textarea class="w3-input w3-border" style="resize:none" name="reason" required=""></textarea>
      </div>
      <button type="submit" class="w3-button w3-block w3-padding-32 w3-green w3-margin-bottom w3-right w3-half">Send TLs Email</button>
    </form>  
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
