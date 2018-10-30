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

    <div id="form-messages" class="w3-panel w3-hide w3-display-container">
      <span onclick="$(this).parent().fadeOut()"
      class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p>Green often indicates something successful or positive.</p>
    </div>

    <div class="w3-container" style="margin-top: 100px;">
      <p class="w3-text-red">Call the details of the ticket you just raised through to a CCNA staff member. Always call the &#39;First
Contact&#39; first. If they don&#39;t pick up, call the &#39;Second Contact&#39; etc.</p>
    </div>

    <div class="w3-container" style="margin-bottom: 20px">
      <p class="w3-text-purple">(NOTE: Clicking a STAFF CONTACT NUMBER will automatically COPY the PHONE NUMBER. Please use the VICIDIAL CALL TRANSFER to CONTACT the STAFF.)</p>
    </div>

    <div class="w3-container">
      <form action="../php/ccna.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="<?= $_POST['form_type'] ?>">
        <input class="w3-hide" type="hidden" name="ticket_number" value="<?= $_POST['ticket_number'] ?>">
        <input class="w3-hide" type="hidden" name="campaign" value="ccna">
        <input id="staff" class="w3-hide" type="hidden" name="staff" value="">
        <h4 class="w3-text-purple"><strong style="text-decoration: underline;">BUSINESS HOURS:</strong></h4>
        <div class="w3-row w3-gray">
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIRST CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Chinatsu Coghlan - 0414 380 000</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SECOND CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Sharon Lee - 0428 117 338</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">THIRD CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Matt Brown - 0416 121 713</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FOURTH CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Tony Westlake - 0477 302 308</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIFTH CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SIXTH CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
          </div>
        </div>
        <br>
        <h4 class="w3-text-purple"><strong style="text-decoration: underline;">AFTER HOURS AND PUBLIC HOLIDAYS:</strong></h4>
        <div class="w3-row w3-gray">
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIRST CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Sharon Lee - 0428 117 338</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">SECOND CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Matt Brown - 0416 121 713</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">THIRD CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Tony Westlake - 0477 302 308</button>
          </div>
          <div class="w3-col w3-padding w3-half" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FOURTH CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
          </div>
          <div class="w3-col w3-padding" style="text-align: center">
            <h3 style="text-decoration: underline; display: inline-block; background: lightgray; padding: 10px">FIFTH CONTACT: </h3>
            <button type="button" onclick="copyToClipboard(this)"  class="save w3-button w3-block w3-pale-blue w3-padding-16 w3-half" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
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
        <div class="w3-row" style="margin: 50px auto;">
          <div class="w3-col s10 w3-text-red"><strong>Confirm that you have escalated the call and spoken to an engineer: </strong></div>
          <div class="w3-col s2">
            <select id="confirm" class="w3-select w3-border" name="escalated">
              <option value="" disabled selected></option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
        </div>

        <div id="confirm-message" class="w3-container" style="">
        </div>

        <div class="" style="margin-top: 20px">
          <div class="w3-row">
            <div class="w3-col w3-quarter w3-right"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
          </div>
        </div>
      </form>
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
        $('form').submit();
      }else{
        $('#confirm-message').html('<div class="w3-col s6 w3-text-red"><strong class="w3-text-red" style="text-decoration: underline;">Call the CCNA Staff Member! This is an essential part of the call process and MUST be done before you can terminate the call.</strong></div>');
      }
    });
    // $('.save').on('click', function(){
    //   var staff = $(this).text();

    //   this.form.action += "?staff=" + staff;
    //   // this.form.submit();

    // });
  });

// Copy Text/Value to Clipboard
function copyToClipboard(elementId) {
  // Create a "hidden" input
  var aux = document.createElement("input");
  var value = elementId.innerHTML;

  // Assign it the value of the specified element
  aux.setAttribute("value", value.substring(value.indexOf("-") + 1).replace(/\s/g,''));
  // Append it to the body
  document.body.appendChild(aux);
  // Highlight its content
  aux.select();
  // Copy the highlighted text
  document.execCommand("copy");
  // Remove it from the body
  document.body.removeChild(aux);
  document.getElementById('staff').value = value;
}
</script>
</script>

</body>
</html>
