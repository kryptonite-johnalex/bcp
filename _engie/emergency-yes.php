<?php
session_start();

if(isset($_GET['fullname']) && isset($_GET['fullname'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['fullname'];
  $_SESSION["phone"] = $_GET['phone'];
}

?>
<!DOCTYPE html>
<html>
<title>Manual Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include_once('../assets/style.html'); ?>
<style>
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
  .w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php require('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <form>
    <div class="w3-container">
      <div style="margin-top: 150px;">
        <p class="w3-text-red">For all Emergency, Critical or Urgent (P0-P1) calls, call the ENGIE BU to confirm that the email notification has been sent and received successfully. Use the 'Call ENGIE BU' button below</p>
        <p class="w3-text-red"><b>If the email has not been received, go back and attempt to send the email again. If the email does not go through after that, ask TL for assistance.</b></p>
        <div class="w3-row w3-margin-top">
        	<?php var_dump($_GET); ?>
            <div class="w3-col s12 w3-text-blue"><p>BU Phone Number: <?php echo $_GET['bu_phone']; ?></p></div>
            <div class="w3-col s12 w3-text-blue"><p>BU Email Address: <?php echo $_GET['bu_email']; ?></p></div>
            <div class="w3-col s12">
              <div class="w3-row w3-padding">
                <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-32 w3-aqua w3-margin-bottom w3-quarter w3-card">Call Engie BU</button>
              </div>
            </div>
            <div class="w3-row w3-margin-top">
              <div class="w3-col s2"><p>Call Outcome</p></div>
              <div class="w3-col s2">
                <select id="call_outcome" class="w3-select w3-border" name="call_outcome">
                  <option selected="" disabled="disabled"></option>
                  <option value="received">Email Received by BU</option>
                </select>
              </div>
            </div>
          </div>
      </div>
      <div class="w3-light-gray w3-padding showScript" style="margin-top: 80px; display: none">
        <p class="w3-text-red">Once the job is accepted, follow the documented procedure for Allocating a Technician in Pronto(After Hours and On-Call). Full details of this procedure are in UKS and the G:Drive.</p>
        <p class="w3-text-red">Once the job as been allocated in Pronto, click the button below to send an email notification to the relevant personnel.</p>
        <div class="w3-row w3-padding">
          <button type="submit" class="w3-button w3-block w3-padding-32 w3-pale-red w3-margin-bottom w3-half w3-right w3-card">Continue</button>
        </div>
      </div>
    </div>

    <div class="w3-row showScript" style="margin-top: 50px;">
      <div class="w3-row w3-padding">
        <button type="button" onclick="window.location.href='/_engie/index.php'" class="w3-button w3-block w3-padding-32 w3-light-gray w3-margin-bottom w3-quarter w3-card w3-right">Back</button>
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
    $('#showScript').change(function(){
      if($(this).val() == 'yes') {
        $('.showScript').show();
      }
    });
  });

</script>
</body>
</html>
