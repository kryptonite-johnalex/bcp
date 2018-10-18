<?php
session_start();

// $page_js = false;

?>
<!DOCTYPE html>
<html>
<title>Policy Screen</title>
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

  <div class="w3-container" style="margin-top: 115px;">
    <form action="../php/petbarn.php" method="POST">
      <input type="hidden" name="purchased" value="yes">
      <?php
        if(isset($_GET)) {
          foreach($_GET as $key=>$value) { 
            echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
          }
        }
      ?>
      <div class="w3-row w3-half">
        <div class="w3-col s3 w3-text-black"><p>Policy Number: </p></div>
        <div class="w3-col s7">
          <input class="w3-input w3-border" type="text" name="policy_number" placeholder="">
        </div>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <input class="w3-check" type="checkbox" name="sale_ob_call" <?php echo (!isset($_GET['sale_ob_call'])) ? : 'checked' ?>>
        <label><span class="w3-text-purple" style="font-size: 26px;">SALE FROM OB CALL?</span></label>
      </div>
      <div class="w3-row" style="margin-bottom: 20px">
        <p class="w3-text-indigo">Is there anything else I can help you with today?</p>
      </div>
      <div class="w3-container" style="margin-top: 20px;">
        <div class="w3-row">
          <div class="w3-col w3-padding w3-half"><input type="submit" name="action" value="Yes" class="w3-button w3-block w3-green w3-padding-32" id="yes"/></div>
          <div class="w3-col w3-padding w3-half"><input type="submit" name="action" value="No" class="w3-button w3-block w3-red w3-padding-32"/></div>
        </div>
      </div>
      <div id="form-messages" class="w3-hide w3-container" style="background-color: transparent !important;">
        <div class="w3-col w3-padding w3-half" style="margin: 0 auto; float: none;"><button onclick="window.location.href='/index.php'" class="w3-button w3-block w3-red w3-padding-32">Terminate Call</button></div>
      </div>
    </form>
  </div>

  <div class="w3-container" style="margin-top: 10px;">
    <div class="w3-row">
      <div class="w3-col w3-padding w3-quarter"><button onclick="window.history.back()" class="w3-button w3-block w3-gray w3-padding-32">Back</button></div>
    </div>
  </div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#yes").on("click", function(){
        window.location.href = '/_petbarn/index.php';
    });
  });
</script>
</body>
</html>