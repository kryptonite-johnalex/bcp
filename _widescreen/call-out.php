<?php
session_start();

// $page_js = false;

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

      <div id="form-messages" class="w3-panel w3-hide w3-display-container">
        <span onclick="$(this).parent().fadeOut()"
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Success!</h3>
        <p>Green often indicates something successful or positive.</p>
      </div>

      <form action="../php/sendEmail.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="log">
        <input class="w3-hide" type="hidden" name="campaign" value="widescreen">
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Insurance Brand/Retail: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="brand" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Authorised By: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="authorised" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Customer Name: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="customer_name" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Phone Number: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="phone_number" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Address: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="address" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Claim Number: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="claim_number" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Policy Number: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="policy_number" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Vehicle Make: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="vehicle" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half">
          <div class="w3-col s6 w3-text-red"><p>Model: </p></div>
          <div class="w3-col s6">
            <input class="w3-input w3-border" type="text" name="model" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half">
          <div class="w3-col s3 w3-text-red w3-center"><p>Year: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="year" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Glass: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="glass" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p>Price: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="price" placeholder="">
          </div>
        </div>

        <div class="w3-container" id="options" style="margin-top:20px">
          <div class="w3-row">
            <div class="w3-col w3-half w3-padding"><button onclick="window.location.href='/_widescreen/index.php'" class="w3-button w3-block w3-yellow w3-padding-32">Back</button></div>
            <div class="w3-col w3-half w3-padding"><button type="submit" class="w3-button w3-block w3-green w3-padding-32">Send SMS and Terminate Call</button></div>
          </div>
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
