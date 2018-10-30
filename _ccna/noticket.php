<?php
session_start();

// $page_js = false;

?>
<!DOCTYPE html>
<html>
<title>No Ticket Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include_once('../assets/style.html'); ?>
<style>
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:1;cursor:pointer}
  .w3-half img:hover{opacity:0.8}
</style>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php require('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin:40px 40px 0 340px">
  <!-- Header -->
  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" style="margin-top: 115px;">
    <form action="../php/ccna.php" method="POST">
      <input class="w3-hide" type="hidden" name="form_type" value="no_ticket">
      <input class="w3-hide" type="hidden" name="campaign" value="ccna">
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-red">If the ticket does not need to be raised, used the button below to terminate the call. </p>
      </div>
      <div class="w3-col w3-padding w3-half" style="margin: 0 auto; float: none;">
        <button type="submit" class="w3-button w3-block w3-red w3-padding-32">Terminate Call</button>
      </div>
    </form>
  </div>

  <div class="w3-container" style="margin-top: 100px;">
    <div class="w3-row">
      <div class="w3-col w3-padding w3-quarter w3-right"><button class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
    </div>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
<script type="text/javascript">
  // $(document).ready(function(){
  //   $("#yes").on("click", function(){
  //       window.location.href = '/_petbarn/index.php';
  //   });
  // });
</script>
</body>
</html>