<?php 
session_start();
session_unset();  
session_destroy(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$sql = "SELECT * FROM petbarn_log WHERE form_type = 'quote'";

$quote = $conn->query($sql);

$sql = "SELECT * FROM petbarn_log WHERE form_type = 'general_enquiry'";

$general_enquiry = $conn->query($sql);

$sql = "SELECT * FROM petbarn_log WHERE form_type = 'customer_service'";

$customer_service = $conn->query($sql);

$sql = "SELECT * FROM petbarn_log WHERE form_type = 'escalation'";

$escalation = $conn->query($sql);

// $data = array();
// while($row = mysqli_fetch_assoc($quote))
// {
//     foreach($row as $key => $value) {
//         $data[$row['id']][$key] = $value;
//     }
// }
// print_r($data[1]);


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
    <h1 class="w3-jumbo"><b>PETBARN AUSTRALIA</b></h1>
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
      <a href="javascript:void(0)" onclick="openCity(event, 'Quote');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding w3-border-black w3-red">Quote</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'General');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">General Enquiry</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Customer');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Customer Service</div>
      </a>
      <a href="javascript:void(0)" onclick="openCity(event, 'Escalation');">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding">Escalation</div>
      </a>
    </div>

    <div id="Quote" class="tabs" style="">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        $num = 1;
        if ($quote->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $quote->fetch_assoc()) {
              
        ?>
        <tr>
          <td class="id"><?php echo $num; ?></td>
          <td class="agent_name"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="phone"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <?php
          foreach ($row as $key => $value) {
                echo '<td class="' . $key . '" style="display: none;">' . $value . '</td>';
              } ?>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $quote->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>
    <div id="General" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        $num = 1;
        if ($general_enquiry->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $general_enquiry->fetch_assoc()) {
              
        ?>
        <tr>
          <td class="id"><?php echo $num; ?></td>
          <td class="agent_name"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="phone"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <?php
          foreach ($row as $key => $value) {
                echo '<td class="' . $key . '" style="display: none;">' . $value . '</td>';
              } ?>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $general_enquiry->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>
    <div id="Customer" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        $num = 1;
        if ($customer_service->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $customer_service->fetch_assoc()) {
              
        ?>
        <tr>
          <td class="id"><?php echo $num; ?></td>
          <td class="agent_name"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="phone"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <?php
          foreach ($row as $key => $value) {
                echo '<td class="' . $key . '" style="display: none;">' . $value . '</td>';
              } ?>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $customer_service->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
      </tfoot>
    </div>
    <div id="Escalation" class="tabs" style="display:none">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Submitted at</th>
            <th>Sent Status</th>
          </tr>
        </thead>
        <?php
        $num = 1;
        if ($escalation->num_rows > 0) {
            $count=0;
            // output data of each row
            while($row = $escalation->fetch_assoc()) {
              
        ?>
        <tr>
          <td class="id"><?php echo $num; ?></td>
          <td class="agent_name"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="phone"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="time"><?php echo $row['created_at']; ?></td>
          <td class="status"><?php echo ($row['sent_status']) ? 'Sent' : 'Failed'; ?></td>
          <!-- hide -->
          <?php
          foreach ($row as $key => $value) {
                echo '<td class="' . $key . '" style="display: none;">' . $value . '</td>';
              } ?>
        </tr>
        <?php
              $num++;
              if($row['sent_status'] == 1) $count++;
            }
          }
        ?>
      </table>
      <tfoot>
        <p>Total Count: <?php echo $escalation->num_rows; ?> <span class="w3-right">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
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
