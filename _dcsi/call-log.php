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
    <h1 class="w3-jumbo"><b>DSCI</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <div class="w3-row w3-margin-bottom">
      <div class="w3-container">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-tl.php'" class="w3-button w3-right w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Send Email To TL</button>
      </div>
    </div>
    <form action="../php/logCall.php" method="POST">
      <input class="w3-hide" type="hidden" name="form_type" value="log">
      <input class="w3-hide" type="hidden" name="campaign" value="dcsi">
      <input class="w3-hide" type="hidden" name="details" value="<?php echo $_GET['details']; ?>">
      <div class="w3-row w3-light-blue w3-padding-16">
        <div class="w3-container w3-margin-bottom">
          <p class="w3-text-red">Log Call.</p>
          <label class="w3-text-purple">Property Number/ID:</label>
          <input class="w3-input w3-border" type="text" name="property_num" required="" placeholder="" style="width: 50%; display: inline-block;">
        </div>
        <div class="w3-container w3-threequarter w3-text-red" style="width: 85%;">
          <h2>CHINTARO CALLS</h2>
          <p>If a Chintaro call the box below MUST be tick and the correct Community selected from the drop down list. DCSI need this information to be completed for EVERY CHINTARO CALL.</p>
        </div>
        <div class="w3-container w3-text-purple">
          <div class="w3-quarter">
            <input id="chintaro" class="w3-check" type="checkbox" name="chintaro" onClick="enableChintaro()">
            <label>Tick if Chintaro</label>
          </div>
          <div class="w3-half">
            <label>Select Community</label>
            <select id="chintaroList" class="w3-select w3-border" name="chintaroList" style="width: 50%;" disabled="">
              <option selected=""> </option>
              <option>Davenport</option>
              <option>Dunjiba</option>
              <option>Gerard</option>
              <option>Koonnibba</option>
              <option>Point Pearce</option>
              <option>Raukkan</option>
              <option>Umooma</option>
              <option>Yalata</option>
            </select>
          </div>
        </div>
      </div>

      <div class="w3-row" style="margin-top: 20%">
        <div class="w3-container w3-center">
          <button type="submit" class="w3-button w3-padding-24 w3-text-green w3-margin-bottom w3-card">Click to Terminate Call</button>
        </div>
      </div>

      <div class="w3-container" id="options" style="margin-top:75px">
        <div class="w3-row">
          <div class="w3-container w3-half">
            <p class="w3-text-purple w3-show-inline-block">Did you send a CCB reminder on this call (Y/N)</p>&nbsp;
            <input class="w3-input w3-border" type="text" name="reminder" placeholder="" maxlength="1" value="" style="width: 50px; display: inline-block;">
          </div>
          <div class="w3-container w3-half">
            <button type="button" onclick="window.location.href = '/_dcsi/index.php'" class="w3-button w3-right w3-padding-large w3-light-gray w3-margin-bottom w3-card">Back</button>
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
