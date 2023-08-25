<?php
// gets the navigation part all in one
include_once "navPart.php";

// it makes the connection to the database
include_once("database.php");
$setDb = configuration::connection_database();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Auction Page</title>
	</head>
	<body>
		<main>
			<h3>Add Category</h3>

            <?php
			// query fire to check the category
    		$hbe = $_GET['modifyCat'];
    		$sql = $setDb->prepare("
    			SELECT * FROM category WHERE category_id=?;
    			");

    		$sql->execute([$hbe]);
    	 ?>

			<form method="POST" action="allFunction.php">
				<!-- gets the name of the category  -->
	            <label>Update Category Name</label>

                <?php foreach($sql as $value ){ ?>
    	 		<input type="text" name="up_cv" required="" value=<?php echo $value['categoryName'] ?>>
    	 		<input type="hidden" name="up_cv_id" value=<?php echo $value['category_id'] ?>>

    	 	<?php } ?>
             <input type="submit" name="upBtn" value="Update" >
			</form>

		</main>

	</body>
</html>
