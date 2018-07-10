<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('php/db_connect.php');

$sql = "SELECT * FROM quu_complaints";

$result = $conn->query($sql);

$script = "SELECT * FROM quu_script";

$result2 = $conn->query($script);

?>
<!DOCTYPE html>
<html>
<title>Note Script Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once('assets/style.html'); ?>
<style>
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
  .w3-half img:hover{opacity:1}
  .ol {list-style-type: decimal}
  .ol > li {border-bottom: none;}
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
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Note Script Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <div class="w3-container w3-light-gray">
      <ul class="w3-ul ol w3-padding" style="list-style-type: decimal;">
        <li>Get customer's full address and locate properly in Q-Care</li>
        <li>If address cannot be located in Q-Care. Check that the property is within QUU service area on KIT Page - 'Suburbs / Postcodes For Each Region'</li>
        <li>Access Live Unplanned Outage Board from Unplanned Works and Outages page in KIT to locate any other reports of the same issue and restoration times</li>
        <li>Access Capital Works: Fire Hydrant Rehabilitation Program Schedule from KIT</li>
        <li>Access Q-Care to determine if there are any active shutplans affecting the property - engage Senior/ NAPs contact/ Service and Despatch for further support it appropriate</li>
        <li>Provide restoration if service information to customer if issue is identified through above steps, is already known to QUU and/or job does not need to be logged</li>
      </ul>
    </div>
  </div>

  <div class="w3-container" id="options" style="margin-top:50px">
  <h2>Details</h2>

    <div class="w3-container w3-margin-bottom w3-padding">
      <div class="w3-row">
        <div class="w3-col s2 w3-center w3-padding">
          <button type="button" onclick="window.history.back()" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Back</button>
        </div>
        <div class="w3-col s2 w3-center w3-padding">
          <button type="button" onclick="" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Continue</button>
        </div>
        <div class="w3-col s4 w3-center w3-padding">
          <button type="button" onclick="window.location.href = '/quu/complaints.php'" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Complaints</button>
        </div>
        <div class="w3-col s2 w3-center w3-padding">
          <button type="button" onclick="" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Wrap</button>
        </div>
        <div class="w3-col s2 w3-center w3-padding">
          <button type="button" onclick="window.location.href = '/quu/escalation.php'" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Escalation</button>
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-col s4 w3-center w3-padding">
          <button type="button" onclick="getScript(1)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Burst Main</button>
        </div>
        <div class="w3-col s4 w3-center w3-padding">
          <button type="button" onclick="getScript(2)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Sewage Overflow</button>
        </div>
        <div class="w3-col s4 w3-center w3-padding">
          <button type="button" onclick="getScript(3)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">No Water</button>
        </div>
      </div>

      <div class="w3-row">
        <div class="w3-col s6 w3-center w3-padding">
          <button type="button" onclick="getScript(4)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Leak: Footpath, Grass, Road</button>
        </div>
        <div class="w3-col s6 w3-center w3-padding ">
          <button type="button" onclick="getScript(5)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Leak at Meter</button>
        </div>
      </div>

      <div class="w3-row">
        <div class="w3-col s6 w3-center w3-padding">
          <button type="button" onclick="getScript(6)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Faulty Stopcock</button>
        </div>
        <div class="w3-col s6 w3-center w3-padding">
          <button type="button" onclick="getScript(7)" class="w3-button w3-block w3-padding-16 w3-red w3-margin-bottom">Low Pressure</button>
        </div>
      </div>
    </div>
  </div>
  <div class="w3-container w3-border w3-padding w3-light-gra w3-card-4" id="scriptDiv" style="margin-top:75px">
    <p>
      <input class="w3-check" type="checkbox">
      <label>Where is the water coming from?</label></p>
    <p>
      <input class="w3-check" type="checkbox">
      <label>What street location is the water loss at?</label></p>
    <p>
      <input class="w3-check" type="checkbox">
      <label>How would you describe the flow of water - is it faster than a garden hose on full?</label></p>
    <p>
      <input class="w3-check" type="checkbox">
      <label>Is the water bubbling up or gushing up into the air?</label></p>
    <p>
      <input class="w3-check" type="checkbox">
      <label>Has the grass, concrete or road surface broken?</label></p>
    <p>
      <input class="w3-check" type="checkbox">
      <label>Is there a safety hazard - affecting traffic or pedestrians?</label></p>
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('partials/footer.php'); ?>

<?php include_once('assets/scripts.html'); ?>
<script type="text/javascript">


function getScript(options) {
  $.ajax({
    type: "GET",
    url: "getscript.php",
    data: { script: options },
    cache: false,
    success: function (data) {
      $('#scriptDiv').html(data);
    },
    error: function(err) {
      console.log(err);
    }
  });
}

</script>
</body>
</html>
