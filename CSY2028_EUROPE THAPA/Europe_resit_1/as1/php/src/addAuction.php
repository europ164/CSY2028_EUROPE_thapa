<?php
// from here we can add the navigation part and the code will not be repeted
include_once "navPart.php";

// connection made through the database
include_once("database.php");
// configuration of the database
$setDb = configuration::connection_database();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Auction Page</title>
	</head>
	<body>
		<main>
			<h3>Add Auction</h3>
			
			<!-- form for adding the auction -->
            <form method="POST" action="allFunction.php">
                <label for="auction_title">Auction Title:</label>
                <input type="text" name="auction_title" required><br><br>

				<!-- label for descriptiopn -->
                <label for="descriptionAuction">Description:</label>
                <textarea name="descriptionAuction" required></textarea><br><br>

                <label for="bidAmount">Bid Amount:</label>
                <input type="text" name="bidAmount" required><br><br>

                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" required><br><br>

                <label>Category Type</label>
	        <?php

	        //here we had swleceted from the category database
	        $sql = $setDb->prepare("SELECT * FROM category;");
	        $sql->execute();

	        ?>

<!-- here we had created a selective drop down button  -->
	        <select name="cat_auction">

				<?php foreach($sql as $val ){ ?>
					<!-- shows option for the article categories -->
				<option value=<?php echo $val['category_id'] ?> ><?php echo $val['categoryName']; ?></option>
				<?php } ?>

			</select>

			<!-- now we have created a button to submit the addition section -->
                <input type="submit" name="addAuc" value="Create Auction">
            </form>

		</main>

	</body>
</html>
