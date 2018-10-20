<?php
session_start();

// $page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Contact Staff Screen</title>
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
      <p class="w3-text-red">Call the details of the ticket you just raised through to a CCNA staff member. Always call the &#39;First
Contact&#39; first. If they don&#39;t pick up, call the &#39;Second Contact&#39; etc.</p>
    </div>

    <div class="w3-container">
      <form action="../php/petbarn.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="<?= $_POST['form'] ?>">
        <input class="w3-hide" type="hidden" name="campaign" value="ccna">
        <h4 class="w3-text-purple"><strong style="text-decoration: underline;">BUSINESS HOURS:</strong></h4>
        <div class="w3-row w3-gray">
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIRST CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Chinatsu Coghlan - 0414 380 000</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SECOND CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Sharon Lee - 0428 117 338</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">THIRD CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Matt Brown - 0416 121 713</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FOURTH CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Tony Westlake - 0477 302 308</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIFTH CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SIXTH CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
          </div>
        </div>
        <br>
        <h4 class="w3-text-purple"><strong style="text-decoration: underline;">AFTER HOURS AND PUBLIC HOLIDAYS:</strong></h4>
        <div class="w3-row w3-gray">
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIRST CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Sharon Lee - 0428 117 338</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SECOND CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Matt Brown - 0416 121 713</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">THIRD CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Tony Westlake - 0477 302 308</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FOURTH CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
          </div>
          <div class="w3-col w3-padding" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIFTH CONTACT: </h3>
            <button type="submit" onclick="window.location.href='#'" class="w3-button w3-block w3-pale-blue w3-padding-16 w3-half" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
          </div>
        </div>

        <!-- <div class="w3-row">
          <div class="w3-col w3-padding"><input type="submit" name="action" class="w3-button w3-block w3-orange w3-padding-32 w3-half" style="float: none; margin: 0 auto" value="Transfer to Customer Service" /></div>
          <div class="w3-col w3-padding w3-text-red w3-text-center">
            <p class="w3-center"><b>(Select Option 1 for Customer Service)</b></p>
            <p>Only transfer calls to customer service between the hours of 8am and 8pm (AEST), Monday to Friday. Calls outside of these times need to call back when customer service is open, or log an escalation.</p>
          </div>
          <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/escalation.php'" class="w3-button w3-block w3-green w3-padding-32 w3-half" style="float: none; margin: 0 auto">Escalation</button></div>
        </div> -->
      </form>
    </div>

    <div class="w3-row w3-padding" style="margin-top: 30px;">
      <div class="w3-col s10 w3-text-red"><strong>Confirm that you have escalated the call and spoken to an engineer: </strong></div>
      <div class="w3-col s2">
        <select id="confirm" class="w3-select w3-border" name="option">
          <option value="" disabled selected></option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
    </div>

    <div id="confirm-message" class="w3-container" style="">
    </div>

    <div class="w3-container" style="margin-top: 20px">
      <div class="w3-row">
        <div class="w3-col w3-quarter w3-right"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
      </div>
    </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#confirm').on('change', function(){
      if($(this).val() == 'yes') {
        $('#confirm-message').html('<div class="w3-col w3-padding w3-half" style="margin: 0 auto; float: none;"><button onclick="window.location.href=`/index.php`" class="w3-button w3-block w3-red w3-padding-32">Terminate Call</button></div>');
      }else{
        $('#confirm-message').html('<div class="w3-col s6 w3-text-red"><strong class="w3-text-red" style="text-decoration: underline;">Call the CCNA Staff Member! This is an essential part of the call process and MUST be done before you can terminate the call.</strong></div>');
      }
    });
  });
</script>

</body>
</html>
