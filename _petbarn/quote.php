<?php
session_start();

// $page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Quote Screen</title>
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
      <p class="w3-text-indigo">May I start by confirming your name and contact number?</p>
    </div>

    <div class="w3-container">
      <form action="../php/petbarn.php" method="POST">
        <input class="w3-hide" type="hidden" name="form_type" value="quote">
        <input class="w3-hide" type="hidden" name="campaign" value="petbarn">
        <div class="w3-row w3-half">
          <div class="w3-col s3 w3-text-red"><p>First Name: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="first_name" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half">
          <div class="w3-col s3 w3-text-red"><p>Last Name: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="last_name" placeholder="">
          </div>
        </div>
        <div class="w3-row w3-half">
          <div class="w3-col s3 w3-text-red"><p>Phone Number: </p></div>
          <div class="w3-col s7">
            <input class="w3-input w3-border" type="text" name="phone_number" placeholder="">
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s4 w3-text-red"><p class="w3-text-indigo">How did you hear about PetBarn Pet Insurance?: </p></div>
          <div class="w3-col s8">
            <input class="w3-input w3-border" type="text" name="hear_from" placeholder="">
          </div>
        </div>
        <div class="w3-container" style="margin: 20px 0;">
          <div class="w3-row">
            <div class="w3-col w3-padding"><a href="https://petbarnstaff.petsure.com.au/Staff/SignIn?ReturnUrl=%2FStaff%2F" class="w3-button w3-block w3-orange w3-padding-32 w3-half" style="float: none; margin: 0 auto;" target="_blank">Log-In to the Web Portal</a></div>
          </div>
        </div>
        <div class="w3-row" style="text-align: center; margin-bottom: 20px">
          <input class="w3-check" type="checkbox" name="sale_ob_call">
          <label><span class="w3-text-purple" style="font-size: 26px;">SALE FROM OB CALL?</span></label>
        </div>
        <div class="w3-row" style="margin: 20px 0;">
          <p class="w3-text-red">Follow the scripting prompts on the right-hand side of the portal.</p>
          <p class="w3-text-red"><b>Ensure you refer to and use the Promotion Codes and Unique Selling Points (USPs) on every call!</b></p>
        </div>
        <div class="w3-row">
          <div class="w3-col s3 w3-text-red"><p class="w3-text-indigo">Additional Comments: </p></div>
          <div class="w3-col s9">
            <textarea class="w3-input w3-border" name="additional_comments" style="resize:none; height: 240px"></textarea>
          </div>
        </div>

        <div class="w3-container" style="margin-top: 20px;">
          <div class="w3-row">
            <div class="w3-col w3-padding w3-half"><input type="submit" name="purchased" value="Purchased" class="w3-button w3-block w3-green w3-padding-32" id="buy"/></div>
            <div class="w3-col w3-padding w3-half"><input type="submit" name="purchased" value="Not Purchased" class="w3-button w3-block w3-red w3-padding-32"/></div>
          </div>
        </div>
      </form>
    </div>
    
    <div class="w3-container" style="margin-top: 10px;">
      <div class="w3-row">
        <div class="w3-col w3-padding w3-quarter"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
      </div>
    </div>

    <!-- <div class="w3-container" style="margin-top: 20px;">
      <div class="w3-row">
        <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/quote.php'" class="w3-button w3-block w3-pink w3-padding-32">Quote</button></div>
        <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/customer-service.php?type=gen'" class="w3-button w3-block w3-green w3-padding-32">General Enquiry</button></div>
        <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/customer-service.php?type=cust'" class="w3-button w3-block w3-green w3-padding-32">Customer Service</button></div>
        <div class="w3-col w3-padding"><button onclick="window.location.href='/_petbarn/escalation.php'" class="w3-button w3-block w3-green w3-padding-32">Escalation to Petbarn</button></div>
      </div>
    </div> -->

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#buy").on("click", function(){
      this.form.action = "../_petbarn/policy.php";
      this.form.method = "GET";
      this.form.submit();
    });
  });
</script>

</body>
</html>
