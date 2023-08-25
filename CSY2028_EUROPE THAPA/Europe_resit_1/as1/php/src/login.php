<?php
// here we get the navigation section
include_once "navPart.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Auction Page</title>
	</head>
	<body>
		<main>
			<h3>User Login</h3>
			<!-- form throws to allFunction set to query -->

			<form method="POST" action="allFunction.php">

	            <label>E-mail</label>
	            <input type="text"  name="mailing_the_user" placeholder="Enter Mail" required="">

				<label>Password</label>
	            <input type="password"  name="pass_the_user" placeholder="Enter your password" required="">

	            <input type="submit" name="ok_user_lo" value="Submit" >
			</form>

		</main>

	</body>
</html>
