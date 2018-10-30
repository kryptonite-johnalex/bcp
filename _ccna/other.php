<?php
session_start();

// $page_js = false;

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

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" style="margin-top: 115px;">
    <form action="../php/ccna.php" method="POST">
      <input class="w3-hide" type="hidden" name="form_type" value="other">
      <input class="w3-hide" type="hidden" name="campaign" value="ccna">
      <input id="staff" class="w3-hide" type="hidden" name="staff" value="">
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
      <!--
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
      -->
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-purple">NOTE: Kindly use the VICIDIAL Call Transfer and COPY the phone number in the osTicket.</p>
        <!--
        <p class="w3-text-purple">NOTE: Only put one digit in the &#39;areacode&#39; box. I.e. the areacode 04 become 4 OR the areacode 08 becomes 8</p>
        -->
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p>2. If you are unable to contact that particular member of staff, please WARM TRANSFER the call to Chinatsu Coghlan, or for sales opportunities, call Craig Sims or Eoin Coghlan.</p>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <div class="w3-col w3-padding w3-half" style="text-align: center">
          <button type="button" onclick="copyToClipboard(this)" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Chinatsu Coghlan - 0414 380 000</button>
        </div>
        <div class="w3-col w3-padding w3-half" style="text-align: center">
          <button type="button" onclick="copyToClipboard(this)" class="w3-button w3-block w3-pale-blue w3-padding-16" style="float: none; margin: 0 auto">Craig Sims - 0401 004 040</button>
        </div>
        <div class="w3-col w3-padding" style="text-align: center">
          <button type="button" onclick="copyToClipboard(this)" class="w3-button w3-block w3-pale-blue w3-padding-16 w3-half" style="float: none; margin: 0 auto">Eoin Coghlan - 0422 422 221</button>
        </div>
      </div>

      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-purple">(NOTE: Clicking a STAFF CONTACT NUMBER will automatically COPY the PHONE NUMBER. Please use the VICIDIAL CALL TRANSFER to CONTACT the STAFF.)</p>
      </div>

      <div class="w3-row w3-padding" style="margin-top: 30px;">
        <div class="w3-col s10 w3-text-red"><strong>Confirm that you have escalated the call and spoken to an engineer: </strong></div>
        <div class="w3-col s2">
          <select id="confirm" class="w3-select w3-border" name="escalated">
            <option value="" disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
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
  $(document).ready(function(){
    $("#confirm").on("change", function(){
        // window.location.href = '/_petbarn/index.php';
        $('form').submit();
    });
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

// Insert Parameters in the URL
function insertParam(key, value) {
    key = escape(key); value = escape(value);

    var kvp = document.location.search.substr(1).split('&');
    if (kvp == '') {
        document.location.search = '?' + key + '=' + value;
    }
    else {
        var i = kvp.length; var x; while (i--) {
            x = kvp[i].split('=');

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }
}
</script>
</body>
</html>