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
			<h3>Register User</h3>
			<!-- gets the user register through this form and work in allFunction -->
			<form method="POST" action="allFunction.php">
				<!-- email section  -->
	            <label>E-mail</label>
	            <input type="text"  name="mailing_the_regUser" placeholder="Enter Mail" required="">

				<!-- Username section -->
                <label>Username</label>
	            <input type="text"  name="naming_the_regUser" placeholder="Enter Name" required="">
	            
	            <!-- password section -->
				<label>Password</label>
	            <input type="password"  name="pass_the_regUser" placeholder="Enter your password" required="">
	            <!-- finally registered -->
	            <input type="submit" name="logged_regUser" value="Register" >
			</form>

		</main>

	</body>
</html>
