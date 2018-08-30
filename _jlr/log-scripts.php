<?php
session_start();

if(isset($_GET['fullname']) && isset($_GET['fullname'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['fullname'];
  $_SESSION["phone"] = $_GET['phone'];
}

$page_js = false;

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
    <h1 class="w3-jumbo"><b>JLR IN CONTROL EMERGENCY BCP NOTES</b></h1>
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
      <input class="w3-hide" type="hidden" name="campaign" value="jlr">
      <input class="w3-hide" type="hidden" name="job_type" value="<?php echo $_POST['job_type'] ?>">
      <input class="w3-hide" type="hidden" name="reason" value="<?php echo $_POST['reason'] ?>">
      <input class="w3-hide" type="hidden" name="vehicle_registration" value="<?php echo $_POST['vehicle_registration'] ?>">

      <?php if($_POST['job_type']) { ?>
      <p class="w3-text-red">Ask the caller if they require emergency services.</p>
      <p class="w3-text-red">If they do, and there are persons injured, do not ask them to confirm their PIN.</p>
      <p class="w3-text-red">Attempt to confirm the location of the vehicle and, if possible, confirm with the caller that the details are accurate.</p>
      <p class="w3-text-red">Attempt to confirm with the caller the number of occupants, whether any children are involved and the status of each of the occupants.</p>
      <p class="w3-text-red">Call 000 and ask for the required emergency service.</p>
      <p class="w3-text-red">Follow all instructions of the emergency services operator</p>
      <?php } else { ?>
      <p class="w3-text-red">Ask the caller to confirm their PIN before proceeding.</p>
      <p class="w3-text-red">Ask the caller if the theft has just occurred.</p>
      <p class="w3-text-purple">YES</p>
      <p class="w3-text-red">Follow normal Stolen Vehicle SOP</p>
      <p class="w3-text-purple">NO</p>
      <p class="w3-text-red">Do they have a Police Report Number?</p>
      <p class="w3-text-red">If they do not, advise them that you are unable to assist until they have one.</p>
      <p class="w3-text-red">If they do, follow the normal Stolen Vehicle SOP</p>
      <?php } ?>
      <div class="w3-row">
        <div class="w3-container">
          <button type="submit" style="width: 30%;margin: 0 auto;display: block;" class="w3-button w3-block w3-right w3-padding-24 w3-margin-bottom w3-card">Back</button>
        </div>
        <p></p>
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
