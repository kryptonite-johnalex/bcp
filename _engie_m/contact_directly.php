<?php
session_start();

// if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch'])) {
//   // Set session variables
//   $_SESSION["agent"] = $_GET['user'];
//   $_SESSION["phone"] = $_GET['phone_number'];
//   $_SESSION["epoch"] = $_GET['epoch'];
// } else {
//   $_SESSION["agent"] = 'C223';
//   $_SESSION["phone"] = '92342360';
//   $_SESSION["epoch"] = 1538471463;
// }

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
  .w3-half img{opacity: 1;cursor: pointer;display: block;}
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
  <div class="w3-container w3-margin-top">
    <div class="w3-quarter">
      <p></p>
      <!-- <button type="button" onclick="window.location.href = '/_melbourne/'" class="w3-button w3-block w3-card w3-padding-32 w3-cyan">Stop Recording</button> -->
    </div>
  </div>

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>
  
  <!-- Header -->
    <div class="w3-container" id="top">

      <p class="w3-text-red" style="text-decoration: underline;"><b>Use the email function below to send an email notification to the applicable ENGIE BU.</b></p>

      <form action="../php/sendEmail.php" method="POST">
      <input class="w3-hide" type="text" name="form_type" value="direct">
      <input class="w3-hide" type="text" name="campaign" value="engie_m">
      <input class="w3-hide" type="text" name="job_accept" value="<?php echo 'no'; ?>">
      <div class="w3-row w3-margin-top w3-third">
        <div class="w3-col s4"><p>ENGIE BU Code: </p></div>
        <div class="w3-col s6">
          <select id="bu_code" class="w3-select w3-border" name="bu_code">
            <option selected="" disabled="disabled"></option>
            <option value="4522|sydneyservice.anz@engie.com,service@contact121.com.au|297375400">4522</option>
            <option value="45N2|newcastleservice.anz@engie.com,service@contact121.com.au|249545710">45N2</option>
            <option value="45B2|sydneyservice.anz@engie.com,service@contact121.com.au|297375400">45B2</option>
            <option value="45A2|sydneyservice.anz@engie.com,service@contact121.com.au|260515252">45A2</option>
            <option value="45C2|sydneyservice.anz@engie.com,service@contact121.com.au|262803500">45C2</option>
            <option value="4532|au.mech.servicevic@engie.com,service@contact121.com.au|387873211">4532</option>
            <option value="4532|au.mech.servicevic@engie.com,service@contact121.com.au|387873211">4532</option>
            <option value="4542|brisservice.anz@engie.com,service@contact121.com.au|730094440">4542</option>
            <option value="45V2|brisservice.anz@engie.com,service@contact121.com.au|730094440">45V2</option>
            <option value="45T2|servicefnq.anz@engie.com,service@contact121.com.au|747718300">45T2</option>
            <option value="45U2|servicefnq.anz@engie.com,service@contact121.com.au|747718300">45U2</option>
            <option value="4552|servicesa.anz1@engie.com,service@contact121.com.au|881931600">4552</option>
            <option value="42Y2|bunbury.reception.anz@engie.com,service@contact121.com.au|862407488">42Y2</option>
            <option value="4562|servicewa.anz.mech@engie.com,service@contact121.com.au|892490860">4562</option>
            <option value="4572|servicewa.anz.mech@engie.com,service@contact121.com.au|892490860">4572</option>
            <option value="4113|nac@anz.engie.com,service@contact121.com.au|730094240">4113</option>
            <option value="Outage|nac@anz.engie.com,service@contact121.com.au">Outage</option>
          </select>
        </div>
      </div><!-- </form> -->
    </div>

  <div class="w3-container w3-light-gray" id="options" style="margin-top:20px">
    <div class="w3-row">
      <div class="w3-col-12 w3-padding">
        
          <div class="w3-row">

            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Branch (BU): </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="branch" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Branch Email: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="branch_email" placeholder="">
              </div>
            </div>

          </div>
          <div class="w3-row">

            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Site Name: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="site_name" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Site Address: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="site_address" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Caller's Name: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="caller_name" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Caller's Phone: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="caller_phone" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Subject: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="subject" placeholder="">
              </div>
            </div>

          </div>
          <div class="w3-row">

            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Other: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="other" placeholder="">
              </div>
            </div>

          </div>
          <div class="w3-row">
            <div class="w3-row">
              <div class="w3-col s12"><p>Details of Call: </p></div>
              <div class="w3-col s12">
                <input class="w3-input w3-border" type="text" name="details[]" placeholder="">
                <p></p>
                <input class="w3-input w3-border" type="text" name="details[]" placeholder="">
                <p></p>
                <input class="w3-input w3-border" type="text" name="details[]" placeholder="">
              </div>
            </div>
          </div>

          <div class="w3-row w3-margin-top">
	          <div class="w3-row">
	            <button type="submit" class="w3-button w3-block w3-padding-32 w3-purple w3-margin-bottom w3-quarter">Send Email</button>
	          </div>
	      </div>
        
      </div>

    </div>

  </div>

	</form>
  <div class="w3-row showScript" style="margin-top: 50px;">
    <div class="w3-row w3-padding">
      <button type="button" onclick="window.location.href='/_engie_m/'" class="w3-button w3-block w3-padding-32 w3-light-gray w3-margin-bottom w3-quarter w3-card w3-right">Back</button>
    </div>
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
