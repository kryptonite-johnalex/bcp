<?php
session_start();

// $page_js = false;

if($_GET['type'] == 'gen') {
  $title = 'General Enquiry';
  $form = 'general_enquiry';
} else {
  $title = 'Customer Service';
  $form = 'customer_service';
}
?>
<!DOCTYPE html>
<html>
<title><?= $title; ?> Screen</title>
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

    <div class="w3-container" style="margin-top: 100px;">
      <p class="w3-text-indigo">I will pass you on to our customer service team now.</p>
    </div>

    <div class="w3-container" style="margin-top: 100px;">
      <form action="../php/petbarn.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="<?= $form ?>">
        <input class="w3-hide" type="hidden" name="campaign" value="petbarn">
        <div class="w3-row">
          <div class="w3-col w3-padding"><input type="submit" name="action" class="w3-button w3-block w3-orange w3-padding-32 w3-half" style="float: none; margin: 0 auto" value="Transfer to Customer Service" /></div>
          <div class="w3-col w3-padding w3-text-red w3-text-center">
            <p class="w3-center"><b>(Select Option 1 for Customer Service)</b></p>
            <p>Only transfer calls to customer service between the hours of 8am and 8pm (AEST), Monday to Friday. Calls outside of these times need to call back when customer service is open, or log an escalation.</p>
          </div>
          <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/escalation.php'" class="w3-button w3-block w3-green w3-padding-32 w3-half" style="float: none; margin: 0 auto">Escalation</button></div>
        </div>
      </form>
    </div>

    <div class="w3-container" style="margin-top: 100px;">
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
