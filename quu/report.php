<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('php/db_connect.php');

$sql = "SELECT * FROM quu_complaints";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<title>Report Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once('assets/style.html'); ?>
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
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Reports Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>

  <div class="w3-container" id="report" style="margin-top:75px">
  <h2>Details</h2>

  <div class="w3-container w3-border w3-margin-bottom w3-padding" style="display: none;">

  </div>

  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-red">
        <th>No.</th>
        <th>Full Name</th>
        <th>Contact Number</th>
        <th>Full Address</th>
        <th>Postal Code</th>
        <th>Submitted at</th>
        <th>Sent Status</th>
      </tr>
    </thead>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['first_name'] . " " . $row['sur_name']; ?></td>
      <td><?php echo $row['contact_number']; ?></td>
      <td><?php echo $row['addr_number'] . " " . $row['addr_street'] . ", " . $row['addr_suburb']; ?></td>
      <td><?php echo $row['postal_code']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
      <td><?php echo ($row['sent_status']) ? 'Yes' : 'No'; ?></td>
    </tr>
<?php
    }
  } else {
      echo "<h2>0 results</h2>";
  }
  $conn->close();
?>
  </table>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('partials/footer.php'); ?>

<?php include_once('assets/scripts.html'); ?>
<script type="text/javascript">

$(document).ready(function() {
  $("tr").click(function() {
    var MyRows = $(this).find('td:first-child').text();

    console.log(MyRows);
  });
});

</script>
</body>
</html>
