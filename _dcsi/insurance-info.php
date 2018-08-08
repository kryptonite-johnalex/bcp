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
<title>Location Codes</title>
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
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>Location Codes</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div class="w3-row w3-margin-bottom">
      <div class="w3-container">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-tl.php'" class="w3-button w3-right w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Send Email To TL</button>
      </div>
    </div>
<div class="w3-container">
<p class="w3-text-red"><strong>Below are the procedure that must be followed for any call that relate to Fire, Injury or Damage.</strong></p>
<p class="w3-text-purple">
<span><strong>Public Risk Insurance Reporting Procedures</strong></span>
<br><br>
	1. Incident occurs on Housing SA rental stock premises that results in: 
			• an injury to a tenant or their visitor(s) or;
			• damage to personal property of an tenant or their visitor(s)
			• tenant or their visitor reports the incident to the Maintenance Centre 
	2. The Maintenance Centre will:
			• check whether the property is owned by Housing SA (using Property Maintenance computer system)
			• send an interim to the relevant Maintenance Area Office, Metropolitan or Country
			• ring the Maintenance Coordinator if injury or damage to property. (e.g. motor vehicle damage to house or fencing) NOTE: The extent of injury is to be noted on the interim. If the tenant reports a minor scratch that did not warrant medical treatment, the interim. referral is to be noted for information only.
<br><br><br><br>
<span><strong>General Damage Insurance Reporting Procedures</strong></span>
<br><br>
	3. Occupied property is damaged 
	4. Tenant reports the damage to the Maintenance Centre
	5. The Maintenance Centre will: 
			• check whether the property is owned by Housing SA (using Property Maintenance computer system)
			• send an interim to the relevant Works Manager if dwelling located in the Metropolitan area or Country Maintenance Coordinator
			• raise an order direct to a contractor (where appropriate) unless authorised by the Maintenance Coordinator
<br><br><br><br>
<span><strong>Fire Insurance Reporting Procedures</strong></span>
<br>
	The Maintenance Centre will: 
	6. Advise the Maintenance Coordinator by phone
	7. Send an interim to the Maintenance Coordinator and the Insurance Officer, notating incident details, person reporting the fire, police or fire report number -where available- and any other contact phone numbers
	8. If the fire is after hours, refer to After Hours process (question 11).
</p>
<br>
<p class="w3-text-red"><strong>ALL INFORMATION IS TAKEN DIRECTLY FROM THE OPERATORS MANUAL.</strong></p>


</div>

  <div class="w3-container" id="options" style="margin-top:75px">
    <div class="w3-row">
      <div class="w3-container w3-half">
        <p></p>
      </div>
      <div class="w3-container w3-half">
        <button type="button" onclick="window.location.href = '/_dcsi/index.php'" class="w3-button w3-right w3-padding-large w3-light-gray w3-margin-bottom w3-card">Back</button>
      </div>
    </div>
  </div>
</div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
