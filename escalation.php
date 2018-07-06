<!DOCTYPE html>
<html>
<head>
	<title>Escalation</title>
</head>
<style type="text/css">
	a.button {
		-webkit-appearance: button;
		-moz-appearance: button;
		appearance: button;

		text-decoration: none;
		color: initial;
		padding: 5px 10px;
	}
</style>
<body>

	<form action="" method="POST">
		<p>Enter the details of this calls into the QUU Citrix. Copy and paster the Incident Number and KIT wrap code into the relevant boxes
		at the end of the call.</p>
		<label>QUU Incident Number</label>
		<input type="number" name="incidentnumber" placeholder="0000">
		<p>If the call was about an already existing incident adn not reporting a new one, please enter the original incident number.</p>
		<label>QUU Wrap Code</label>
		<input type="text" name="wrapcode" placeholder="NA">
		<p></p>
		<a href="complaints.html" class="button">Complaints</a>
		<a href="/" class="button">Back</a>
		<p></p>
		<p>For each A1 (no water, water pressurem burst main etc). You must enter the area (street and suburb) and the reason why
		you are raising the A1. Press the Email button to alert Joan.</p>
		<label>Street and Suburb</label>
		<input type="text" name="street">
		<p></p>
		<label>Reason</label>
		<input type="text" name="reason">
		<p></p>
		<input type="submit" name="send" value="Send TLs Email">
	</form>

</body>
</html>