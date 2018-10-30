<?php 
session_start();
session_unset();  
session_destroy(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../php/db_connect.php');

$sql = "SELECT * FROM ccna_log";

$log = $conn->query($sql);

// $data = array();
// while($row = mysqli_fetch_assoc($log))
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
    <h1 class="w3-jumbo"><b>CCNA</b></h1>
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
      <!-- <a href="javascript:void(0)" onclick="openCity(event, 'Log');"> -->
      <a href="javascript:void(0)">
        <div class="w3-quarter tablink w3-bottombar w3-hover-red w3-padding w3-border-black w3-red">Log</div>
      </a>
      </a>
    </div>

    <div id="Log" class="tabs" style="">
      <table class="w3-table-all w3-hoverable">
        <thead>
          <tr class="w3-red">
            <th>No.</th>
            <th>Agent Name</th>
            <th>Phone</th>
            <th>Ticket Number</th>
            <th>Escalated</th>
            <th>Submitted at</th>
            <th>Status</th>
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
          <td class="not"><?php echo $num; ?></td>
          <td class="not"><?php echo !empty($row['agent_name']) ? $row['agent_name'] : "&nbsp;"; ?></td>
          <td class="not"><?php echo !empty($row['phone']) ? $row['phone'] : "&nbsp;"; ?></td>
          <td class="not"><?php echo $row['ticket_number']; ?></td>
          <td class="not"><?php echo $row['escalated']; ?></td>
          <td class="not"><?php echo $row['created_at']; ?></td>
          <td class="not"><?php echo $row['form_type']; ?></td>
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
        <p>Total Count: <?php echo $log->num_rows; ?> <span class="w3-right" style="display: none;">Mail Sent : <?php echo isset($count) ? $count : 0; ?></span></p>
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
    $(this).find('td').not('.not').each(function( index ) {
      data += '<div class="w3-col s4 w3-large"><strong>' + this.className + ': </strong></div> <div class="w3-col s8 w3-large">' + $( this ).html() + '</div>';
    });
    var id = $(this).find('td.id').text();
    var ticket_number = $(this).find('td.ticket_number').text();
    var epoch = $(this).find('td.epoch').text();
    var status = $(this).find('td.form_type').text();
    $('#id01').show().find('header > h2').text("Ticket Number: " + ticket_number);
    $('#id01').find('footer > p').html("Timestamp: " + epoch + "<span style='float:right;'> Status: " + status + "</span>");
    $('#id01 > div > .data').html(data);
  });
});

</script>
</body>
</html>
