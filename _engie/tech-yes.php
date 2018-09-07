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
        <p class="w3-text-red">Refer to the Master AH & On-Call Roster for current AH & On-Call personnel to dispatch the job to.</p>
        <p class="w3-text-red">Phone the on-call TECH to allocate the job.</p>
        <div class="w3-row w3-margin-top">
            <div class="w3-col s3"><p>Was the job accepted? </p></div>
            <div class="w3-col s4">
              <select id="showScript" class="w3-select w3-border" name="job_accept">
                <option selected="" disabled="disabled"></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
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

    <div class="w3-row showScript" style="margin-top: 50px; display: none">
      <div class="w3-row w3-padding">
        <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-32 w3-light-gray w3-margin-bottom w3-quarter w3-card">Back</button>
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
