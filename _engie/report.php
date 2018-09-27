<?php 
session_start();
session_unset();  
session_destroy(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$sql = "SELECT * FROM engie_log";

$log = $conn->query($sql);

$sql = "SELECT * FROM engie_direct";

$direct = $conn->query($sql);

$sql = "SELECT * FROM engie_allocation";

$allocation = $conn->query($sql);

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
    <h1 class="w3-jumbo"><b>Engie Fire</b></h1>
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
      <a href="javascript:void(0)" onclick="openCity(event, 'Logs');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding w3-border-black w3-red">Reports</div>
      </a>
<!--       <a href="javascript:void(0)" onclick="openCity(event, 'Allocation');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Allocation</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Direct');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Direct</div>
      </a> -->
    </div>

    <div id="Logs" class="tabs" style="">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone Number</th>
            <th>Fire Type</th>
            <th>Caller's Name</th>
            <th>Caller's Phone</th>
            <th>Epoch</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        $num = 1;
        if ($log->num_rows > 0) {

            $count=0;
            // output data of each row
            while($row = $log->fetch_assoc()) {
        ?>
        <tr>
          <td class="No."><?php echo $num; ?></td>
          <td class="Agent Name"><?php echo $row['agent_name']; ?></td>
          <td class="Phone"><?php echo $row['phone']; ?></td>
          <td class="Fire Type"><?php echo $row['fire_type']; ?></td>
          <td class="Caller Name"><?php echo $row['caller_name']; ?></td>
          <td class="Caller Phone"><?php echo $row['caller_phone']; ?></td>
          <td class="Epoch"><?php echo $row['epoch']; ?></td>
          <td class="Created At"><?php echo $row['created_at']; ?></td>
          <td class="Status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="Debtor Name" style="display: none"><?php echo $row['debtor_name']; ?></td>
          <td class="Site Name" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Address" style="display: none"><?php echo $row['address']; ?></td>
          <td class="Building" style="display: none"><?php echo $row['building']; ?></td>
          <td class="PO#/WO#" style="display: none"><?php echo $row['powo']; ?></td>
          <td class="Fault/Issue" style="display: none"><?php echo $row['issue']; ?></td>
          <td class="Urgency" style="display: none"><?php echo $row['urgency']; ?></td>
          <td class="Is Tech Allocation Required?" style="display: none"><?php echo $row['tech_allocation_required']; ?></td>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
        <?php
        if ($allocation->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $allocation->fetch_assoc()) {
        ?>
        <tr>
          <td class="No."><?php echo $num; ?></td>
          <td class="Agent Name"><?php echo $row['agent_name']; ?></td>
          <td class="Phone"><?php echo $row['phone']; ?></td>
          <td class="Fire Type"><?php echo $row['fire_type']; ?></td>
          <td class="Caller Name"><?php echo $row['caller_name']; ?></td>
          <td class="Caller Phone"><?php echo $row['caller_phone']; ?></td>
          <td class="Epoch"><?php echo $row['epoch']; ?></td>
          <td class="Created At"><?php echo $row['created_at']; ?></td>
          <td class="Status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="Job Accept" style="display: none"><?php echo $row['job_accept']; ?></td>
          <td class="BU Code" style="display: none"><?php echo $row['bu_code']; ?></td>
          <td class="Subcontractor Phone/Email" style="display: none"><?php echo $row['subcontractor_phone_email']; ?></td>
          <td class="Pronto Number" style="display: none"><?php echo $row['pronto_num']; ?></td>
          <td class="Work Type" style="display: none"><?php echo $row['work_type']; ?></td>
          <td class="Branch" style="display: none"><?php echo $row['branch']; ?></td>
          <td class="Branch Email" style="display: none"><?php echo $row['branch_email']; ?></td>
          <td class="Tech Allocated" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Is Tech Attending?" style="display: none"><?php echo $row['site_name']; ?></td>


          <td class="Site Name" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Site Address" style="display: none"><?php echo $row['site_address']; ?></td>
          <td class="Subject" style="display: none"><?php echo $row['subject']; ?></td>

          <td class="Issue Reported" style="display: none"><?php echo $row['issues']; ?></td>
          <td class="Additional Note" style="display: none"><?php echo $row['notes']; ?></td>


          <td class="Is Tech Allocation Required?" style="display: none"><?php echo $row['tech_allocation_required']; ?></td>
          <td class="Emergency/Urgent/Critical" style="display: none"><?php echo $row['call_type']; ?></td>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
        <?php
        if ($direct->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $direct->fetch_assoc()) {
        ?>
        <tr>
          <td class="No."><?php echo $num; ?></td>
          <td class="Agent Name"><?php echo $row['agent_name']; ?></td>
          <td class="Phone"><?php echo $row['phone']; ?></td>
          <td class="Fire Type"><?php echo $row['fire_type']; ?></td>
          <td class="Caller Name"><?php echo $row['caller_name']; ?></td>
          <td class="Caller Phone"><?php echo $row['caller_phone']; ?></td>
          <td class="Epoch"><?php echo $row['epoch']; ?></td>
          <td class="Created At"><?php echo $row['created_at']; ?></td>
          <td class="Status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="BU Code" style="display: none"><?php echo $row['bu_code']; ?></td>
          <td class="Branch" style="display: none"><?php echo $row['branch']; ?></td>
          <td class="Branch Email" style="display: none"><?php echo $row['branch_email']; ?></td>
          <td class="Tech Allocated" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Is Tech Attending?" style="display: none"><?php echo $row['site_name']; ?></td>


          <td class="Site Name" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Site Address" style="display: none"><?php echo $row['site_address']; ?></td>
          <td class="Subject" style="display: none"><?php echo $row['subject']; ?></td>

          <td class="Other" style="display: none"><?php echo $row['other']; ?></td>
          <td class="Details" style="display: none"><?php echo $row['details']; ?></td>

        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $log->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>

    <div id="Allocation" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone Number</th>
            <th>Fire Type</th>
            <th>Caller's Name</th>
            <th>Caller's Phone</th>
            <th>Epoch</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        if ($allocation->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $allocation->fetch_assoc()) {
        ?>
        <tr>
          <td class="No."><?php echo $row['id']; ?></td>
          <td class="Agent Name"><?php echo $row['agent_name']; ?></td>
          <td class="Phone"><?php echo $row['phone']; ?></td>
          <td class="Fire Type"><?php echo $row['fire_type']; ?></td>
          <td class="Caller Name"><?php echo $row['caller_name']; ?></td>
          <td class="Caller Phone"><?php echo $row['caller_phone']; ?></td>
          <td class="Epoch"><?php echo $row['epoch']; ?></td>
          <td class="Created At"><?php echo $row['created_at']; ?></td>
          <td class="Status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="Job Accept" style="display: none"><?php echo $row['job_accept']; ?></td>
          <td class="BU Code" style="display: none"><?php echo $row['bu_code']; ?></td>
          <td class="Subcontractor Phone/Email" style="display: none"><?php echo $row['subcontractor_phone_email']; ?></td>
          <td class="Pronto Number" style="display: none"><?php echo $row['pronto_num']; ?></td>
          <td class="Work Type" style="display: none"><?php echo $row['work_type']; ?></td>
          <td class="Branch" style="display: none"><?php echo $row['branch']; ?></td>
          <td class="Branch Email" style="display: none"><?php echo $row['branch_email']; ?></td>
          <td class="Tech Allocated" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Is Tech Attending?" style="display: none"><?php echo $row['site_name']; ?></td>


          <td class="Site Name" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Site Address" style="display: none"><?php echo $row['site_address']; ?></td>
          <td class="Subject" style="display: none"><?php echo $row['subject']; ?></td>

          <td class="Issue Reported" style="display: none"><?php echo $row['issues']; ?></td>
          <td class="Additional Note" style="display: none"><?php echo $row['notes']; ?></td>


          <td class="Is Tech Allocation Required?" style="display: none"><?php echo $row['tech_allocation_required']; ?></td>
          <td class="Emergency/Urgent/Critical" style="display: none"><?php echo $row['call_type']; ?></td>
        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $allocation->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>

    <div id="Direct" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone Number</th>
            <th>Fire Type</th>
            <th>Caller's Name</th>
            <th>Caller's Phone</th>
            <th>Epoch</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        if ($direct->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $direct->fetch_assoc()) {
        ?>
        <tr>
          <td class="No."><?php echo $row['id']; ?></td>
          <td class="Agent Name"><?php echo $row['agent_name']; ?></td>
          <td class="Phone"><?php echo $row['phone']; ?></td>
          <td class="Fire Type"><?php echo $row['fire_type']; ?></td>
          <td class="Caller Name"><?php echo $row['caller_name']; ?></td>
          <td class="Caller Phone"><?php echo $row['caller_phone']; ?></td>
          <td class="Epoch"><?php echo $row['epoch']; ?></td>
          <td class="Created At"><?php echo $row['created_at']; ?></td>
          <td class="Status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="BU Code" style="display: none"><?php echo $row['bu_code']; ?></td>
          <td class="Branch" style="display: none"><?php echo $row['branch']; ?></td>
          <td class="Branch Email" style="display: none"><?php echo $row['branch_email']; ?></td>
          <td class="Tech Allocated" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Is Tech Attending?" style="display: none"><?php echo $row['site_name']; ?></td>


          <td class="Site Name" style="display: none"><?php echo $row['site_name']; ?></td>
          <td class="Site Address" style="display: none"><?php echo $row['site_address']; ?></td>
          <td class="Subject" style="display: none"><?php echo $row['subject']; ?></td>

          <td class="Other" style="display: none"><?php echo $row['other']; ?></td>
          <td class="Details" style="display: none"><?php echo $row['details']; ?></td>

        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $direct->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
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
      data += '<div class="w3-col s4 w3-large"><strong>' + this.className + ': </strong></div> <div class="w3-col s6 w3-large">' + $( this ).html() + '</div>';
    });

    var id = $(this).find('td.id').text();
    var account = $(this).find('td.account').text();
    var time = $(this).find('td.Created').text();
    var status = $(this).find('td.Status').text();
    $('#id01').show().find('header > h2').text("Account: " + account);
    $('#id01').find('footer > p').text("Status: " + status + "  Timestamp: " + time);
    $('#id01 > div > .data').html(data);



  });
});

</script>
</body>
</html>
