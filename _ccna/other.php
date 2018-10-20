<?php
session_start();

$page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Other Screen</title>
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
        <strong>If the caller asks to speak with a member of CCNA staff that&#39;s not an IT engineer:</strong>
        <p>1. Use the Agent Directory on osTicket to locate contacts for staff members.</p>
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
      <div class="w3-row">
        <div class="w3-col s2 w3-padding">
          <input class="w3-input w3-border" type="text" name="areacode" placeholder="Area Code">
        </div>
        <div class="w3-col s4 w3-padding">
          <input class="w3-input w3-border" type="text" name="phone_number" placeholder="Phone Number">
        </div>
        <div class="w3-col s6 w3-padding">
          <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Dial Out</button>
        </div>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-purple">NOTE: Only put one digit in the &#39;areacode&#39; box. I.e. the areacode 04 become 4 OR the areacode 08 becomes 8</p>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p>2. If you are unable to contact that particular member of staff, please WARM TRANSFER the call to Chinatsu Coghlan, or for sales opportunities, call Craig Sims or Eoin Coghlan.</p>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <div class="w3-col w3-padding w3-half" style="text-align: center">
          <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Chinatsu Coghlan - 0414 380 000</button>
        </div>
        <div class="w3-col w3-padding w3-half" style="text-align: center">
          <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
        </div>
        <div class="w3-col w3-padding" style="text-align: center">
          <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16 w3-half" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
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