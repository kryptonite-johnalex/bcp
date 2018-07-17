<!DOCTYPE html>
<html>
<title>Adelaide - Order Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once('../assets/style.html'); ?>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php include_once('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Loader/Spinner -->
<div class="loading"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">

<!--     <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Escalation Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round"> -->
  </div>

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" id="escalation" style="margin-top:75px">
    <p class="w3-text-red">Click the shortcut on your desktop to open the web site Follow prompts to complete the order.</p>
    <p class="w3-text-red">If the web site is available, complete the order and enter the web invoice number below.</p>
    <form action="../php/sendOrder.php" method="POST">
      <input class="w3-hide" type="text" name="form_type" value="order">
      <div class="w3-section">
        <div class="w3-row">
          <div class="w3-twothird w3-mobile w3-text-purple" style="width: 60%">
            <label>Web Invoice Number : </label>
            <input class="w3-input w3-border" type="text" name="invoice_num" required="" placeholder="0000" style="display: inline-block; width: 500px; max-width: 100%;">
          </div>
            
          <div class="w3-third w3-mobile w3-text-purple" style="width: 40%">
            <strong>Website : </strong> https://tickets.homelottery.com.au/call-centre<br><strong>Username : </strong> callcentre<br><strong>Password : </strong> soa2018
          </div>
        </div>
      </div>
      
      <div class="w3-section" style="margin-top:15% !important">
        <p class="w3-text-blue">Thank you for supporting The Hospital Research Foundation and good luck! Goodbye.</p>
        <p class="w3-text-green">If the website is unavailable, click the Back End Order.button to continue with the order.</p>
        <p class="w3-text-green">Only process back end orders if there are issues with the website, do not use for cards that have been declined.</p>
      </div>
      <div class="w3-row">
        <div class="w3-half w3-padding">
          <div class="w3-twothird w3-padding">
            <button type="submit" class="w3-button w3-block w3-padding-32 w3-pale-green w3-card">Back End Order</button>
          </div>
        </div>
        <div class="w3-half w3-padding-32">
          <div class="w3-row">
            <div class="w3-quarter w3-padding">
              <button type="button" onclick="window.location.href = '/adelaide/'" class="w3-button w3-block w3-padding-16 w3-pale-red w3-card">Home</button>
            </div>
            <div class="w3-quarter w3-padding">
              <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-16 w3-pale-blue w3-card">Back</button>
            </div>
          </div>
        </div>
      </div>
      <!-- <button type="submit" class="w3-button w3-block w3-padding-32 w3-green w3-margin-bottom w3-right w3-half">Send TLs Email</button> -->
    </form>
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
