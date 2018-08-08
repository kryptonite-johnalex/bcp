<?php
session_start();

if(isset($_GET['fullname']) && isset($_GET['fullname'])) {
  // Set session variables
  $_SESSION["agent"] = $_GET['fullname'];
  $_SESSION["phone"] = $_GET['phone'];
}

?>
<!DOCTYPE html>
<html>
<title>Location Codes</title>
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
<?php require('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">
    <h1 class="w3-jumbo"><b>Location Codes</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>
    <hr style="width:50px;border: 5px solid red" class="w3-round">

    <div class="w3-row w3-margin-bottom">
      <div class="w3-container">
        <button type="button" onclick="window.location.href = '/_dcsi/escalation-tl.php'" class="w3-button w3-right w3-padding-24 w3-light-gray w3-margin-bottom w3-text-red w3-card">Send Email To TL</button>
      </div>
    </div>
<div class="w3-container">
<table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey">
        <th>Location Number</th>
        <th>Location Description</th>
      </tr>
    </thead>
<?php if($_REQUEST['page'] == 1) { ?>
    <tr>
      <td>1</td>
      <td>Bedroom 1</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Bedroom 2</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Bedroom 3</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Bedroom 4</td>
    </tr>
    <tr>
      <td>6</td>
      <td>Lounge</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Kitchen</td>
    </tr>
    <tr>
      <td>8</td>
      <td>Bathroom</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Shower Recess</td>
    </tr>
    <tr>
      <td>10</td>
      <td>Ensuite</td>
    </tr>
    <tr>
      <td>11</td>
      <td>Toilet</td>
    </tr>
    <tr>
      <td>12</td>
      <td>Laundry</td>
    </tr>
    <tr>
      <td>13</td>
      <td>Passage</td>
    </tr>
    <tr>
      <td>14</td>
      <td>Sleepout</td>
    </tr>
    <tr>
      <td>15</td>
      <td>B/Enclosure</td>
    </tr>
    <tr>
      <td>16</td>
      <td>Entrance Hall</td>
    </tr>
    <tr>
      <td>17</td>
      <td>Balcony</td>
    </tr>
    <tr>
      <td>18</td>
      <td>Stairway</td>
    </tr>
    <tr>
      <td>19</td>
      <td>Carport</td>
    </tr>
    <tr>
      <td>20</td>
      <td>Dinette</td>
    </tr>
    <tr>
      <td>21</td>
      <td>Tool Shed</td>
    </tr>
    <tr>
      <td>22</td>
      <td>Garage</td>
    </tr>
    <tr>
      <td>30</td>
      <td>Pantry</td>
    </tr>
    <tr>
      <td>31</td>
      <td>Front</td>
    </tr>
    <tr>
      <td>32</td>
      <td>Side</td>
    </tr>
    <tr>
      <td>33</td>
      <td>Rear</td>
    </tr>
    <tr>
      <td>34</td>
      <td>Front Porch</td>
    </tr>
    <tr>
      <td>35</td>
      <td>Rear Porch</td>
    </tr>
    <tr>
      <td>36</td>
      <td>Perimeter Front</td>
    </tr>
    <tr>
      <td>37</td>
      <td>Perimeter Rear</td>
    </tr>
    <tr>
      <td>39</td>
      <td>Roof Space</td>
    </tr>
<?php } else { ?>
<tr>
  <td>40</td>
  <td>Crossover</td>
</tr>
<tr>
  <td>41</td>
  <td>Drive</td>
</tr>
<tr>
  <td>61</td>
  <td>Interior</td>
</tr>
<tr>
  <td>57</td>
  <td>Linen Press</td>
</tr>
<tr>
  <td>54</td>
  <td>Washtrough</td>
</tr>
<tr>
  <td>53</td>
  <td>Kitchen Sink</td>
</tr>
<tr>
  <td>52</td>
  <td>Basin</td>
</tr>
<tr>
  <td>51</td>
  <td>Bath</td>
</tr>
<tr>
  <td>62</td>
  <td>Exterior</td>
</tr>
<tr>
  <td>65</td>
  <td>Complete</td>
</tr>
<tr>
  <td>66</td>
  <td>Back Screen Door</td>
</tr>
<tr>
  <td>67</td>
  <td>Front Screen Door</td>
</tr>
<tr>
  <td>74</td>
  <td>Storeroom</td>
</tr>
<tr>
  <td>76</td>
  <td>Car Park</td>
</tr>
<?php } ?>
  </table>
  <p></p>
  <div class="w3-bar">
    <?php if ($_REQUEST['page'] != 1) { ?>
    <a onclick="window.history.back()" class="w3-button">&laquo;</a>
    <?php } ?>
    <a href="?page=1" class="w3-button <?php echo ($_REQUEST['page'] == 1) ? 'w3-green' : ''; ?>">1</a>
    <a href="?page=2" class="w3-button <?php echo ($_REQUEST['page'] == 2) ? 'w3-green' : ''; ?>">2</a>
    <?php if ($_REQUEST['page'] != 2) { ?>
    <a href="?page=2" class="w3-button">&raquo;</a>
    <?php } ?>
  </div>
</div>

  <div class="w3-container" id="options" style="margin-top:75px">
    <div class="w3-row">
      <div class="w3-container w3-half">
        <p></p>
      </div>
      <div class="w3-container w3-half">
        <button type="button" onclick="window.location.href = '/_dcsi/index.php'" class="w3-button w3-right w3-padding-large w3-light-gray w3-margin-bottom w3-card">Back</button>
      </div>
    </div>
  </div>
</div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
