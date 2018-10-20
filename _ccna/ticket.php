<?php
session_start();

$page_js = false;

if($_GET['type'] == 'new') {
  $title = 'Raise New Ticket';
  $form = 'new_ticket';
} else {
  $title = 'Update Existing Ticket';
  $form = 'update_ticket';
}
?>
<!DOCTYPE html>
<html>
<title><?= $title ?> Screen</title>
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

  <div class="w3-container" style="margin-top: 115px;">
    <form action="../_ccna/contact.php" method="POST">
      <input class="w3-hide" type="hidden" name="form_type" value="<?= $form ?>">
      <input class="w3-hide" type="hidden" name="campaign" value="ccna">
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-red">To create a new ticket or update an existing ticket, click the button below: </p>
      </div>
      <div class="w3-container w3-half" style="margin: 20px 0;">
        <div class="w3-row">
          <div class="w3-col w3-padding"><a href="https://ccna.com.au/home/support/scp/login.php" class="w3-button w3-block w3-pale-green w3-padding-32" style="float: none; margin: 0 auto;" target="_blank">Launch osTicket</a></div>
        </div>
      </div>
      <div class="w3-container w3-half" style="margin: 20px 0;">
        <div class="w3-row">
          <div class="w3-col w3-padding w3-yellow w3-half"><p>Username: C121</p><p>Password: Contact121</p></div>
        </div>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-red">See UKS for additional instructions how to create a new ticket or update an existing ticket if needed.</p>
      </div>
      <div class="w3-row w3-half">
        <div class="w3-col s3 w3-text-black"><p>Ticket Number: </p></div>
        <div class="w3-col s7">
          <input class="w3-input w3-border" type="text" name="ticket" placeholder="">
        </div>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-red">Provide the customer with the ticket number.</p>
        <p class="w3-text-indigo">Thank you for your call. This issue will be escalated to our support staff and someone will be in contact with you shortly.</p><br>
        <p class="w3-text-red">Hang up from caller.</p>
        <p class="w3-text-red">To proceed, select an option below, depending on whether you create a new ticket or updated an existing ticket:</p>
      </div>
      <div class="w3-container" style="margin-top: 20px;">
        <div class="w3-row">
          <div class="w3-col w3-padding w3-half"><input type="submit" name="action" value="New Ticket Created" class="w3-button w3-block w3-green w3-padding-32" id="new"/></div>
          <div class="w3-col w3-padding w3-half"><input type="submit" name="action" value="Existing Ticket Updated" class="w3-button w3-block w3-red w3-padding-32"/></div>
        </div>
      </div>
    </form>
  </div>

  <div class="w3-container" style="margin-top: 100px;">
    <div class="w3-row">
      <div class="w3-col w3-padding w3-quarter w3-right"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
    </div>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
<script type="text/javascript">
  // $(document).ready(function(){
  //   $("#yes").on("click", function(){
  //       window.location.href = '/_petbarn/index.php';
  //   });
  // });
</script>
</body>
</html>