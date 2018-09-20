<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
  $_SESSION["epoch"] = $_GET['epoch'];
  $_SESSION["did_extension"] = $_GET['did_extension'];
} else {
  $_SESSION["agent"] = 'N/A';
  $_SESSION["phone"] = 'N/A';
  $_SESSION["epoch"] = 1536710194;
  $_SESSION["did_extension"] = "61870791760";
}

?>
<!DOCTYPE html>
<html>
<title>Initial Screen</title>
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
    <div class="w3-container" id="top" style="margin-top: 100px;">
      <p class="w3-text-blue"><?php if(true) {
        echo "Welcome to National Windscreens you&#39;re speaking with " . $_SESSION['agent'] . ". Please note this call is being recorded for coaching and training purposes. Can I please start with your name?"; } else { echo "Open Script"; } ?></p>
    </div>

    <div class="w3-container" style="margin-top: 100px;">
      <h3>
        <?php switch ($_SESSION ['did_extension']) {
          case 61870791760:
            echo "RETAIL CALL: You MUST advise the customer that the booking time is next business day PM only, do not quote AM ever!";
            break;
          case 61870791761:
            echo "RETAIL CALL: You MUST advise the customer that the booking time is next business day PM only, do not quote AM ever!";
            break;
          case 61870791762:
            echo "Insurance: NRMA";
            break;
          case 61870791763:
            echo "Insurance: RACV";
            break;
          case 61870791764:
            echo "Insurance: SCGIO";
            break;
          case 61870791765:
            echo "Insurance: SGIC";
            break;
          case 61870791766:
            echo "Insurance: Real Insurance";
            break;
          case 61870791767:
            echo "Insurance: Youi";
            break;
          case 61870791768:
            echo "Insurance: Budget Direct and other insurance companies not in the portal";
            break;
          
          default:
            # code...
            break;
        } ?>
      </h3>
    </div>

    <div class="w3-container" style="margin-top: 100px;">
      <p class="w3-text-purple"><b>MYNAGS Glass Codes - Please note that National Windscreens will fit like for like glass.</b></p>
      <p class="w3-text-purple">Please refer to the list below if the Glass Code in MyNags ends in one or more of the letters.</p>
    </div>

    <div id="popUp" class="w3-modal">
      <div class="w3-modal-content">

        <header class="w3-container w3-teal"> 
          <span onclick="document.getElementById('popUp').style.display='none'" 
          class="w3-button w3-display-topright">&times;</span>
          <h2 id="popUpHeader">Modal Header</h2>
        </header>

        <div class="w3-container">
          <p id="popTxt"></p>
        </div>

        <footer class="w3-container w3-teal">
          <p>Modal Footer</p>
        </footer>

      </div>
    </div>

    <div class="w3-container" id="options" style="margin-top:20px">
      <div class="w3-row">
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('A')" class="w3-button w3-block w3-pale-red">A</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('B')" class="w3-button w3-block w3-deep-orange">B</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('D')" class="w3-button w3-block w3-yellow">D</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('H')" class="w3-button w3-block w3-green">H</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('K')" class="w3-button w3-block w3-aqua">K</button></div>
      </div>
      <div class="w3-row">
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('M')" class="w3-button w3-block w3-purple">M</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('Q')" class="w3-button w3-block w3-pink">Q</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('S')" class="w3-button w3-block w3-gray">S</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('V')" class="w3-button w3-block w3-red">V</button></div>
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('X')" class="w3-button w3-block w3-orange">X</button></div>
      </div>
      <div class="w3-row">
        <div class="w3-col w3-padding" style="width:20%"><button onclick="showModal('P')" class="w3-button w3-block w3-khaki">P</button></div>
        <div class="w3-rest"><p class="w3-text-purple">This is an exception. If there is a category P, always choose category P.</p></div>
      </div>
    </div>

    <div class="w3-container" id="options" style="margin-top:20px">
      <div class="w3-row">
        <div class="w3-col w3-half w3-padding"><button onclick="window.location.href='/_widescreen/call-out.php'" class="w3-button w3-block w3-purple w3-padding-32">After Hours Emergency Call Out</button></div>
        <div class="w3-col w3-half w3-padding"><button onclick="" class="w3-button w3-block w3-pink w3-padding-32">Terminate Call</button></div>
      </div>
    </div>


  <!-- <div class="w3-container" id="options" style="margin-top:20px">
    <div class="row">
      <div class="w3-half w3-padding">
        <button type="button" onclick="window.location.href = '/_adelaide/order.php'" class="w3-button w3-block w3-padding-32 w3-light-green w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">Order Ticket</h2></button>
        <button type="button" onclick="window.location.href = '/_adelaide/faq.php'" class="w3-button w3-block w3-padding-32 w3-pale-red w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">FAQ</h2></button>
      </div>
      <div class="w3-half w3-padding">
        <button type="button" onclick="window.location.href = '/_adelaide/'" class="w3-btn w3-block w3-padding-32 w3-aqua w3-margin-bottom" disabled style="opacity: 1;"><strong>Log-in Details for Order Page</strong><br> Username: callcentre<br>Password: soa2018</button>
        <button type="button" onclick="window.location.href = '/_adelaide/escalation.php'" class="w3-button w3-block w3-padding-32 w3-yellow w3-margin-bottom w3-card"><h2 style="margin: 13px 0;">Escalation</h2></button>
      </div>
    </div>
  </div>
 -->

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

<script type="text/javascript">
  function showModal(option){
    $("#popUp").show();
    var text = '';
    switch(option) {
      case "A":
          text = "Radio Antenna. If you are unsure which to use, please ask questions like, can you see if the antenna is anywhere else in the vehicle? If customer is not sure, give them the quote for glass with and without antenna.";
          break;
      case "B":
          text = "Disregard this. Any code with B at the end, please disregard. Use the code with a D.";
          break;
      case "D":
          text = "Rain sensor. If there is an option for D for a glass, please disregard the one without any option.";
          break;
      case "H":
          text = "Heating element. To know if there is a heating element, there will be visible lines at the bottom of the windscreen.";
          break;
      case "K":
          text = "Bracket on glass. If there is an option for K for a glass, please disregard the one without any option.";
          break;
      case "M":
          text = "Mould. The windscreen/glass will be delivered with moulding. If there is an option for M for a glass, please disregard the one without any option.";
          break;
      case "Q":
          text = "Acoustic. Noise cancelling glass/windscreens mostly for diesel engines. If the customer does not want acoustic glass or a non-standard glass, please make note of this in the “repair details” section in the portal.";
          break;
      case "S":
          text = "Solar. Extra UV protection for glass.";
          break;
      case "V":
          text = "Lane departure warning (LDW). Also referred to as ADAS (advanced driver assisted system).";
          break;
      case "X":
          text = "Low-e coating. Heat resistant glass.";
          break;
      case "P":
          text = "This is an exception. If there is a category P, always choose category P.";
          break;
      default:
          text = "N/A";
    }
    $("#popUpHeader").text(option);
    $("#popTxt").text(text);

  }
</script>
</body>
</html>
