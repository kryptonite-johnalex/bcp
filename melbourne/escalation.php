<!DOCTYPE html>
<html>
<title>Melbourne - Escalation Screen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include_once('../assets/style.html'); ?>
<body>

<!-- Sidebar/menu -->
<?php include_once('../partials/sidebar.php'); ?>

<!-- Top menu on small screens -->
<?php include_once('../partials/header.php'); ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Loader/Spinner -->
<div class="loading"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="top">

<!--     <h1 class="w3-jumbo"><b>Queensland Urban Utilities</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Escalation Screen</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round"> -->
  </div>

  <div id="form-messages" class="w3-panel w3-hide w3-display-container">
    <span onclick="$(this).parent().fadeOut()"
    class="w3-button w3-large w3-display-topright">&times;</span>
    <h3>Success!</h3>
    <p>Green often indicates something successful or positive.</p>
  </div>

  <div class="w3-container" id="escalation">
    <div class="w3-section w3-padding" style="margin-top: 50px !important;">
      <p class="w3-text-blue">I don't know how to answer your query, but would be happy to take your details and pass it to a Program <br>Coordinator who will contact you directly.</p>
    </div>
    <form action="../php/sendEscalation.php" method="POST">
      <input class="w3-hide" type="text" name="form_type" value="escalation">
      <input class="w3-hide" type="text" name="campaign" value="melbourne">
      <div class="w3-row">
        <div class="w3-half w3-padding">
          <label>First Name: </label>
          <input class="w3-input w3-border" type="text" name="firstname" required="" placeholder="">
        </div>
        <div class="w3-half w3-padding">
          <label>Last Name: </label>
          <input class="w3-input w3-border" type="text" name="lastname" required="" placeholder="">
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-half w3-padding">
          <label>Phone: </label>
          <input class="w3-input w3-border" type="phone" name="contact" required="" placeholder="">
        </div>
      </div>
      <div class="w3-row">
        <div class="w3-twothird w3-padding">
          <label>Email: </label>
        <input class="w3-input w3-border" type="email" name="email" required="" placeholder="">
        </div>
      </div>
      <div class="w3-section w3-row w3-padding">
        <label>Preferred Contact Method: </label>
        <select class="w3-select w3-border" name="contactmethod" style="padding: 7px !important;" required="">
          <option value="" disabled selected>Choose your option</option>
          <option value="Email">Email</option>
          <option value="Phone">Phone</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="w3-section w3-row w3-padding">
        <label>Frequent Query: </label>
        <select class="w3-select w3-border" name="frequentquery" style="padding: 7px !important;" required="">
          <option value="" disabled selected>Choose your option</option>
          <option value="Brochure Request">Brochure Request</option>
          <option value="Ticket Follow Up">Ticket Follow Up</option>
          <option value="Change of Address">Change of Address</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="w3-section w3-padding">
        <p class="w3-text-red">If the query relates to one of the Frequently Query areas above, select it from the drop down list above. If it does not relate, or further information is required, enter it into the free text boxes below:</p>
        <p class="w3-text-red">Capture as much information as possible, including order confirmation numbers.</p>
      </div>
      <div class="w3-section w3-padding">
        <label>Additional Information</label>
        <textarea class="w3-input w3-border" style="resize:none; height: 200px" name="additionalinfo" required=""></textarea>
      </div>
      <p class="w3-text-blue w3-padding">Thank you for your call again, your details will be forwarded immediately. Goodbye</p>
      <div class="w3-row">
        <div class="w3-half w3-padding">
          <p class="w3-text-red">You MUST CLICK on the "Send Email" button to escalate this enquiry</p>
          <div class="w3-twothird w3-padding-16">
            <button type="submit" class="w3-button w3-block w3-padding-32 w3-pale-blue w3-card">Send Email</button>
          </div>
          <p class="w3-text-red" style="display: inline-block;">Once email has been escalated either terminate call or click "Back" if you need to process an order.</p>
        </div>
        <div class="w3-half">
          <div class="w3-row w3-padding-48">
            <div class="w3-row w3-padding">
              <button type="button" onclick="window.location.href = '/melbourne/'" class="w3-quarter w3-button w3-block w3-padding-16 w3-pale-red w3-card">Home</button>
            </div>
            <div class="w3-row w3-padding">
              <button type="button" onclick="window.history.back()" class="w3-quarter w3-button w3-block w3-padding-16 w3-light-blue w3-card">Back</button>
            </div>
          </div>
        </div>
      </div>
      <!-- <button type="submit" class="w3-button w3-block w3-padding-32 w3-green w3-margin-bottom w3-right w3-half">Send TLs Email</button> -->
    </form>
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<?php include_once('../partials/footer.php'); ?>

<?php include_once('../assets/scripts.html'); ?>

</body>
</html>
