<!DOCTYPE html>
<html>
<title>Complaints Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<?php include_once('partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php include_once('partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Complaints Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
 
  </div>

  <div class="w3-container" id="contact" style="margin-top:75px">
    <form action="" method="POST">
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-third">
          <label>First Name</label>
          <input class="w3-input w3-border" type="text" name="firstname" required="" placeholder="">
        </div>
        <div class="w3-third">
          <label>Surname</label>
          <input class="w3-input w3-border" type="text" name="surname" required="" placeholder="">
        </div>
        <div class="w3-third">
          <label>Contact Number</label>
          <input class="w3-input w3-border" type="phone" name="contact" required="" placeholder="">
        </div>
      </div>
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-col l2">
          <label>Number</label>
          <input class="w3-input w3-border" type="number" name="number" required="" placeholder="">
        </div>
        <div class="w3-col l10">
          <label>Street</label>
          <input class="w3-input w3-border" type="phone" name="street" required="" placeholder="">
        </div>
      </div>
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-col l10">
          <label>Suburb</label>
          <input class="w3-input w3-border" type="text" name="suburb" required="" placeholder="">
        </div>
        <div class="w3-col l2">
          <label>Postal Code</label>
          <input class="w3-input w3-border" type="text" name="postal" required="" placeholder="">
        </div>
      </div>
      <div class="w3-cell-row">
        <div class="w3-container w3-cell">
          <div class="w3-section">
            <label>Customer Account Number</label>
            <input class="w3-input w3-border" type="text" name="account_num" required="" placeholder="">
          </div>
          <div class="w3-section">
            <label>Elipse Job Number (If relevant)</label>
            <input class="w3-input w3-border" type="text" name="job_num" required="" placeholder="">
          </div>
          <div class="w3-section">
            <label>Details of Complaint</label>
            <textarea class="w3-input w3-border" style="resize:none" name="details" required=""></textarea>
          </div>
          <div class="w3-section">
            <label>Actions Taken</label>
            <textarea class="w3-input w3-border" style="resize:none" name="act_taken" required=""></textarea>
          </div>
          <div class="w3-section">
            <label>What the customer would like to be actioned by QUU</label>
            <textarea class="w3-input w3-border" style="resize:none" name="cust_req" required=""></textarea>
          </div>
        </div>
        <div class="w3-container w3-cell w3-cell-middle">
          <button type="button" onclick="window.location.href = '/escalation.php'" class="w3-button w3-block w3-padding-32 w3-orange w3-margin-bottom">To Log Call Screen</button>
          <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-32 w3-red w3-margin-bottom">Back</button>
        </div>
      </div>
      <div class="w3-padding">
        <button type="submit" class="w3-button w3-block w3-padding-32 w3-green w3-margin-bottom w3-half">Send Email</button>
      </div>
    </form>  
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('partials/footer.php'); ?>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
