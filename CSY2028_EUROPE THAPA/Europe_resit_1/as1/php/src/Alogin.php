<?php
// gives the repetative code extends
include_once "navPart.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Auction Page</title>
	</head>
	<body>
		<main>
			<h3>Admin Login</h3>
			<!-- having the form login for admin -->
			<form method="POST" action="allFunction.php">
				<!-- mail section  -->
	            <label>E-mail</label>
	            <input type="text"  name="mailing_the_admin" placeholder="Enter Mail" required="">
	            
	            <!-- password section -->
				<label>Password</label>
	            <input type="password"  name="pass_the_admin" placeholder="Enter your password" required="">
	            <!-- takes us to the allFunction section -->
	            <input type="submit" name="logged_adm" value="Submit" >
			</form>

		</main>

	</body>
</html>
