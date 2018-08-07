<?php 
session_start();
session_unset();  
session_destroy(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$sql = "SELECT * FROM dcsi_escalation";

$escalation = $conn->query($sql);

$sql = "SELECT * FROM dcsi_log";

$log = $conn->query($sql);

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
    <h1 class="w3-jumbo"><b>Adelaide Lottery</b></h1>
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
      <a href="javascript:void(0)" onclick="openCity(event, 'Escalation');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding w3-border-black w3-red">Escalation</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Log');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Log</div>
      </a>
    </div>

    <div id="Escalation" class="tabs" style="">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Escalation Type</th>
            <th>Property Number</th>
            <th>Order Number</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
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
          <td class="agent_name"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="phone"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="escalation_type"><?php echo escalationType($row['escalation_type']); ?></td>
          <td class="property_num"><?php echo !empty($row['property_num']) ? $row['property_num'] : "&nbsp;"; ?></td>
          <td class="order_num"><?php echo !empty($row['order_num']) ? $row['order_num'] : "&nbsp;"; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="contract_code" style="display: none"><?php echo !empty($row['contract_code']) ? $row['contract_code'] : "&nbsp;"; ?></td>
          <td class="contact_name" style="display: none"><?php echo !empty($row['contact_name']) ? $row['contact_name'] : "&nbsp;"; ?></td>
          <td class="contact_phone" style="display: none"><?php echo !empty($row['contact_phone']) ? $row['contact_phone'] : "&nbsp;"; ?></td>
          <td class="contact_addr" style="display: none"><?php echo !empty($row['contact_addr']) ? $row['contact_addr'] : "&nbsp;"; ?></td>
          <td class="message" style="display: none"><?php echo !empty($row['message']) ? $row['message'] : "&nbsp;"; ?></td>
        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $escalation->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo $count; ?></span></p>
      </tfoot>
    </div>
    <div id="Log" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Property Number</th>
            <th>Chintaro</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        if ($log->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $log->fetch_assoc()) {
        ?>
        <tr>
          <td class="id"><?php echo $row['id']; ?></td>
          <td class="agent_name"><?php echo $row['agent_name']; ?></td>
          <td class="phone"><?php echo $row['phone']; ?></td>
          <td class="property_num"><?php echo $row['property_num']; ?></td>
          <td class="chintaro"><?php echo ($row['chintaro']) ? 'Yes' : 'No'; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <td class="chintaro_option" style="display: none;"><?php echo !empty($row['chintaro_option']) ? $row['chintaro_option'] : "N/A"; ?></td>
          <td class="reminded" style="display: none;"><?php echo (lcfirst($row['reminder']) == 'y') ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $log->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo $count; ?></span></p>
      </tfoot>
    </div>

  </div>

  </div>
<?php
function escalationType($escalation_type) {
  switch($escalation_type) {
      case 'tl':
          return 'Sent Email to Team Leader';
          break;
      case 'am':
          return 'Sent Email to Appliance Mgmt';
          break;
      case 'ccb':
          return 'Multiple Reminder/Warranty CCBs';
          break;
      default:
          return 'Error';
  }
}
?>

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
      data += '<div class="w3-col s4 w3-large"><strong>' + this.className + ': </strong></div> <div class="w3-col s8 w3-large">' + $( this ).html() + '</div>';
    });

    var id = $(this).find('td.id').text();
    var account = $(this).find('td.account').text();
    var time = $(this).find('td.time').text();
    var status = $(this).find('td.status').text();
    $('#id01').show().find('header > h2').text("Account: " + account);
    $('#id01').find('footer > p').html("Timestamp: " + time + "<span style='float:right;'> Status: " + status + "</span>");
    $('#id01 > div > .data').html(data);



  });


});

</script>
</body>
</html>
