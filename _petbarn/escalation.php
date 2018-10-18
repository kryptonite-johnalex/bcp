<?php
session_start();

// $page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Escalation Screen</title>
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

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <div class="w3-container" style="margin: 100px auto 30px;">
      <p class="w3-text-indigo">May I confirm your details so that I can pass them on to the PetBarn team?</p>
    </div>

    <div class="w3-container">
      <form id="escalation" action="../php/petbarn.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="escalation">
        <input class="w3-hide" type="hidden" name="campaign" value="petbarn">
        <div class="w3-row w3-half">
          <div class="w3-col s3 "><p>First Name: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="first_name" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half">
          <div class="w3-col s3 "><p>Last Name: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="last_name" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half" style="margin-bottom: 20px">
          <div class="w3-col s3 "><p>Phone Number: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="phone_number" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s2"><p>Address 1: </p></div>
          <div class="w3-col s10">
            <input class="w3-input w3-border" type="text" name="address_1" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s2"><p>Address 2: </p></div>
          <div class="w3-col s10">
            <input class="w3-input w3-border" type="text" name="address_2" placeholder="">
          </div>
        </div>

        <div style="margin-bottom: 20px">
          <div class="w3-row w3-third">
            <div class="w3-col s6"><p>Suburb: </p></div>
            <div class="w3-col s6">
              <input class="w3-input w3-border" type="text" name="suburb" placeholder="">
            </div>
          </div>
          <div class="w3-row w3-third">
            <div class="w3-col s6"><p style="text-align: center">State: </p></div>
            <div class="w3-col s6">
              <input class="w3-input w3-border" type="text" name="state" placeholder="">
            </div>
          </div>
          <div class="w3-row w3-third">
            <div class="w3-col s6"><p style="text-align: center">Postcode: </p></div>
            <div class="w3-col s6">
              <input class="w3-input w3-border" type="text" name="postcode" placeholder="">
            </div>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s2"><p>Details: </p></div>
          <div class="w3-col s10">
            <textarea class="w3-input w3-border" name="details" style="resize:none; height: 240px"></textarea>
          </div>
        </div>

        <div class="w3-container" style="margin-top: 20px;">
          <div class="w3-row">
            <div class="w3-col w3-padding w3-quarter"><input type="submit" name="purchased" value="Send Email" class="w3-button w3-block w3-orange w3-padding-32" id="send"/></div>
          </div>
        </div>

        <div class="w3-row" style="margin: 20px 0;">
          <p class="w3-text-indigo">Thank you for your call, have a nice day/afternoon/night. Escalated calls will receive a call back when the Customer Service Centre is open, Monday - Friday, 8am to 8pm.</p>
        </div>

      </form>
    </div>
    
    <div class="w3-container" style="margin-top: 10px;">
      <div class="w3-row">
        <div class="w3-col w3-padding w3-quarter"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
      </div>
    </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
