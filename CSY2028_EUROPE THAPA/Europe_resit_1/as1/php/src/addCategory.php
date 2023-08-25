<?php
// we donot have to use the navigation part again by using include
include_once "navPart.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Auction Page</title>
	</head>
	<body>
		<main>
			<h3>Add Category</h3>
			<!-- we can add the category from this part of form -->
			<form method="POST" action="allFunction.php">
				<!-- add the category name -->
	            <label>Category Name</label>
	            <input type="text"  name="EnterCategoryName" placeholder="Enter Category Name" required="">
	            
				<!-- submission of the form and event catch by the allFunction.php -->
	            <input type="submit" name="plusCat" value="Submit" >
			</form>

		</main>

	</body>
</html>
