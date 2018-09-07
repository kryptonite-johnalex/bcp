<?php 
session_start();
session_unset();  
session_destroy(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$sql = "SELECT * FROM quu_complaints";

$complaints = $conn->query($sql);

$sql = "SELECT * FROM quu_escalation";

$escalation = $conn->query($sql);

$sql = "SELECT * FROM quu_complaints WHERE type='senior'";

$senior = $conn->query($sql);

$sql = "SELECT * FROM quu_record_script";

$script = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<title>Report Screen</title>
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
<?php include_once('../partials/header.php'); ?>

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

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-red"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="data w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class="w3-container w3-red">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>

  <div id="report" style="margin-top:75px;margin-bottom: 15%">

  <div class="w3-container">
    <div class="w3-row">
      <a href="javascript:void(0)" onclick="openCity(event, 'Complaints');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding w3-border-black w3-red">Complaints</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Senior');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Senior</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Escalation');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Escalation</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Script');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Script</div>
      </a>
    </div>

    <div id="Complaints" class="tabs" style="">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Account Number</th>
            <th>Full Name</th>
            <th>Contact Number</th>
            <th>Full Address</th>
            <th>Postal Code</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        if ($complaints->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $complaints->fetch_assoc()) {
        ?>
        <tr>
          <td class="id"><?php echo $row['id']; ?></td>
          <td class="account"><?php echo $row['acct_number']; ?></td>
          <td class="fullname"><?php echo $row['first_name'] . " " . $row['sur_name']; ?></td>
          <td class="contact"><?php echo $row['contact_number']; ?></td>
          <td class="address"><?php echo $row['addr_number'] . " " . $row['addr_street'] . ", " . $row['addr_suburb']; ?></td>
          <td class="postal"><?php echo $row['postal_code']; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="epoch" style="display: none;"><?php echo $row['epoch']; ?></td>
          <td class="job" style="display: none"><?php echo $row['job_number']; ?></td>
          <td class="details" style="display: none"><?php echo $row['compl_details']; ?></td>
          <td class="action" style="display: none"><?php echo $row['act_taken']; ?></td>
          <td class="request" style="display: none"><?php echo $row['cust_request']; ?></td>
        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $complaints->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>

    <div id="Senior" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Account Number</th>
            <th>Full Name</th>
            <th>Contact Number</th>
            <th>Full Address</th>
            <th>Postal Code</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        if ($senior->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $senior->fetch_assoc()) {

        ?>
        <tr>
          <td class="id"><?php echo $row['id']; ?></td>
          <td class="account"><?php echo $row['acct_number']; ?></td>
          <td class="fullname"><?php echo $row['first_name'] . " " . $row['sur_name']; ?></td>
          <td class="contact"><?php echo $row['contact_number']; ?></td>
          <td class="address"><?php echo $row['addr_number'] . " " . $row['addr_street'] . ", " . $row['addr_suburb']; ?></td>
          <td class="postal"><?php echo $row['postal_code']; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Yes' : 'No'; ?></td>
          <!-- hide -->
          <td class="epoch" style="display: none;"><?php echo $row['epoch']; ?></td>
          <td class="job w3-hide"><?php echo $row['job_number']; ?></td>
          <td class="details w3-hide"><?php echo $row['compl_details']; ?></td>
          <td class="action w3-hide"><?php echo $row['act_taken']; ?></td>
          <td class="request w3-hide"><?php echo $row['cust_request']; ?></td>
        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $senior->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>

    <div id="Escalation" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Reason</th>
            <th>Submitted at</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php
        if ($escalation->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $escalation->fetch_assoc()) {
        ?>
        <tr>
          <td class="id"><?php echo $row['id']; ?></td>
          <td class="agent"><?php echo $row['agent_name']; ?></td>
          <td class="phone"><?php echo $row['phone']; ?></td>
          <td class="address"><?php echo $row['addr_street']; ?></td>
          <td class="reason"><?php echo $row['reason']; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Sent Failed'; ?></td>
          <td class="epoch" style="display: none;"><?php echo $row['epoch']; ?></td>
        </tr>
        <?php
             if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $escalation->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0 . " / " . $escalation->num_rows; ?></span></p>
      </tfoot>
    </div>

    <div id="Script" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent</th>
            <th>Phone</th>
            <th>Script</th>
            <th>List</th>
            <th>Submitted at</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php
        if ($script->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $script->fetch_assoc()) {

              // $list = explode(',',$row['script_list']);
              // $sql = "SELECT * FROM quu_script_list WHERE category_id = '" . $row['script'] . "' AND category_num IN (" . implode(',',$list) . ")";

              $sql = "SELECT * FROM quu_script_list WHERE category_id = '" . $row['script'] . "' AND category_num IN (" . $row['script_list'] . ")";

              $test = $conn->query($sql);

        ?>
        <tr>
          <td class="id"><?php echo $row['id']; ?></td>
          <td class="agent"><?php echo $row['agent_name']; ?></td>
          <td class="phone"><?php echo $row['phone']; ?></td>
          <td class="script"><?php echo $row['script']; ?></td>
          <td class="list"><?php echo $row['script_list']; ?></td>
          <td class="details" style="display: none">
            <ul>
            <?php while($in_row = $test->fetch_assoc()) { ?>
              <li><?php echo $in_row['category_list']; ?></li>
            <?php } ?>
            </ul>
          </td>
          <td class="epoch" style="display: none;"><?php echo $row['epoch']; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Sent Failed'; ?></td>
        </tr>
        <?php
             if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $script->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0 . " / " . $script->num_rows; ?></span></p>
      </tfoot>
    </div>
  </div>

  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
<script type="text/javascript">

$(document).ready(function() {

  // $( "tr > th" ).each(function( index ) {
  //   console.log( index + ": " + $( this ).text() );
  // });


  $("tr:not(.w3-red)").click(function() {

    var data = '<div class="w3-row w3-margin">';
    $(this).find('td').each(function( index ) {
      data += '<div class="w3-col s2 w3-large"><strong>' + this.className + ': </strong></div> <div class="w3-col s10 w3-large">' + $( this ).html() + '</div>';
    });

    var id = $(this).find('td.id').text();
    var account = $(this).find('td.account').text();
    var time = $(this).find('td.time').text();
    var status = $(this).find('td.status').text();
    $('#id01').show().find('header > h2').text("Account: " + account);
    $('#id01').find('footer > p').text("Status: " + status + "  Timestamp: " + time);
    $('#id01 > div > .data').html(data);



  });
});

</script>
</body>
</html>
