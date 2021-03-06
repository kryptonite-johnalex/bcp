<?php
session_start();

if(isset($_GET['user']) && isset($_GET['phone_number']) && isset($_GET['epoch'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['user'];
  $_SESSION["phone"] = $_GET['phone_number'];
  $_SESSION["epoch"] = $_GET['epoch'];
  $_SESSION["did_extension"] = $_GET['did_extension'];
} else {
  $_SESSION["agent"] = 'C233';
  $_SESSION["phone"] = '898977665';
  $_SESSION["epoch"] = 1536710194;
  $_SESSION["did_extension"] = "61870791061";
}

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
      <p class="w3-text-green"><strong>Note: This is a WAMS Bunbury Call</strong></p>
      <!-- <button type="button" onclick="window.location.href = '/_melbourne/'" class="w3-button w3-block w3-card w3-padding-32 w3-cyan">Stop Recording</button> -->
    </div>
    <div class="w3-half">
      <img src="../assets/images/EngieLogo.jpg" alt="logo" style="width: 100%;height: auto;margin: 29px auto 50px;">
    </div>
    <div class="w3-quarter">
      <p></p>
      <button type="button" onclick="window.location.href = '/_engie_m/contact_directly.php'" class="w3-button w3-block w3-card w3-padding-32 w3-khaki">Contact Branch (BU) Directly</button>
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
      <?php if($_SESSION['did_extension'] == "61870791062") { ?>
      <div class="w3-pink w3-padding">
        <h3 style="text-decoration: underline;">This is a HIGH PRIORITY Engie Job and must be treated with extreme urgency!</h3>
      </div>
      <?php } ?>
      <p class="w3-text-blue">Welcome to ENGIE Mechanical. My name is <?php echo $_SESSION['agent']; ?>. How can I help you?</p>
    </div>

  <div class="w3-container" id="options" style="margin-top:20px">
    <div class="w3-row">
      <p class="w3-text-red">Fill in the following details</p>
      <div class="w3-col-12 w3-padding">
        <form action="../php/sendEmail.php" method="POST">
          <input class="w3-hide" type="text" name="form_type" value="log">
          <input class="w3-hide" type="text" name="campaign" value="engie_m">
          <div class="w3-row">

            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Caller Name: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="caller_name" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Caller Phone: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="caller_phone" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Debtor Name: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="debtor_name" placeholder="">
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
              <div class="w3-col s4 w3-center"><p>Address: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="address" placeholder="">
              </div>
            </div>
            <div class="w3-row w3-half">
              <div class="w3-col s4 w3-center"><p>Building Name: </p></div>
              <div class="w3-col s8">
                <input class="w3-input w3-border" type="text" name="building" placeholder="">
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-col s5"><p>Purchase Order Number (PO#) or Work Order Number (WO#): </p></div>
              <div class="w3-col s7">
                <input class="w3-input w3-border" type="text" name="powo" placeholder="">
              </div>
            </div>

          </div>
          <div class="w3-row">
            <div class="w3-row">
              <div class="w3-col s2"><p>Fault/Issue </p></div>
              <div class="w3-col s10">
                <input class="w3-input w3-border" type="text" name="issue[]" placeholder="">
                <p></p>
                <input class="w3-input w3-border" type="text" name="issue[]" placeholder="">
              </div>
            </div>
          </div>
          <div class="w3-row w3-margin-top">
            <div class="w3-col s2"><p>Urgency </p></div>
            <div class="w3-col s4">
              <input class="w3-input w3-border" type="text" name="urgency" placeholder="">
            </div>
          </div>

          <div class="w3-row w3-margin-top">
            <p class="w3-text-purple">
              <input class="w3-check" type="checkbox" name="vs_job" checked="checked">
              <label>Is a job for Visionstream NSW or ACT or Telstra NSW or ACT? </label>
            </p>
          </div>

          <div class="w3-text-red">
            <p>Check the 'National Contract KPI - Priorities' document in UKS for the response times for National clients, if relevant.</p>
            <p>Then, lauch 'Pronto' which is located on your desktop to log the job. Refer to UKS or the G Drive for further instructions on how to log a job in Pronto.</p>
          </div>

          <div class="w3-row w3-margin-top">
            <div class="w3-col s3"><p>Is TECH allocation required? </p></div>
            <div class="w3-col s2">
              <!-- <select id="tech" class="w3-select w3-border" name="tech_allocation" onchange='this.form.submit()'> -->
              <select id="tech" class="w3-select w3-border" name="tech_allocation_required">
                <option selected="" disabled="disabled"></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </div>

        </form> 
      </div>

    </div>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#tech").on("change", function(){
      var flag = $("input").filter(function () {
                return $.trim($(this).val()).length == 0
            }).length == 0;
      this.form.action += "?not_empty=" + flag;
      //this.form.action = "tech-" + $(this).val() + ".php";
      this.form.submit();
    });
  });
</script>

</body>
</html>
