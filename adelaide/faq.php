<!DOCTYPE html>
<html>
<title>Adelaide - FAQ Screen</title>
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

<!--     <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Escalation Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round"> -->
  </div>

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" id="escalation" style="margin-top:75px">
    <div class="w3-section" style="margin-top: 50px !important;">
      <p class="w3-text-red">Refer to UKS to answer callers question.</p>
      <p class="w3-text-red">If you are unable to answer the callers question, click on the Escalation button below.</p>
      <p class="w3-text-blue w3-padding">Thank you for calling the Hospital Research Foundation Lottery today, if you have any further queries please do not hesitate to call us again. Goodbye.</p>
    </div>
    <div class="w3-row" style="margin-top:25%">
      <div class="w3-half w3-padding">
        <div class="w3-twothird w3-padding-16">
          <button type="button" onclick="window.location.href = '/adelaide/escalation.php'" class="w3-button w3-block w3-padding-32 w3-pale-yellow w3-card">Escalation</button>
        </div>
      </div>
      <div class="w3-half">
        <div class="w3-row">
          <div class="w3-row w3-padding">
            <button type="button" onclick="window.location.href = '/adelaide/'" class="w3-quarter w3-button w3-block w3-padding-16 w3-pale-red w3-card">Home</button>
          </div>
          <div class="w3-row w3-padding">
            <button type="button" onclick="window.history.back()" class="w3-quarter w3-button w3-block w3-padding-16 w3-pale-blue w3-card">Back</button>
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
