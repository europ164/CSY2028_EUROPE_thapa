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
    		$hbe = $_GET['modifyAuction'];
    		$sql = $setDb->prepare("
    			SELECT * FROM auction WHERE auction_id=?;
    			");

    		$sql->execute([$hbe]);
    	 ?>

<!-- form for the updatation of the Auction -->
            <form method="POST" action="allFunction.php">

            <?php foreach($sql as $value ){ ?>
                <label for="auction_title">Auction Title:</label>
                <input type="text" name="auction_title_update" value=<?php echo $value['auction_title']; ?> required ><br><br>

                <label for="descriptionAuction">Description:</label>
                <textarea name="descriptionAuction_update" required><?php echo $value['descriptionAuction'] ?></textarea><br><br>

                <label for="bidAmount">Bid Amount:</label>
                <input type="text" name="bidAmount_update" value=<?php echo $value['bidAmount'] ?> required><br><br>

                <label for="endDate">End Date:</label>
                <input type="date" name="endDate_update" value=<?php echo $value['endDate'] ?> required><br><br>

                <input type="hidden" name="auction_id" value=<?php echo $value['auction_id']; ?> required ><br><br>

                <label>Category Type</label>
	        <?php

	        //gets the category part
	        $sql = $setDb->prepare("SELECT * FROM category;");
	        $sql->execute();

	        ?>

	        <select name="cat_auction_update">

				<?php foreach($sql as $val ){ ?>
					<!-- gives all the category value -->
				<option value=<?php echo $val['category_id'] ?> ><?php echo $val['categoryName']; ?></option>
				<?php } ?>

			</select>

            <?php } ?>

			<!-- button to fire the update query in allFunction page -->
                <input type="submit" name="updateAuctionPart" value="Update Auction">
            </form>

		</main>

	</body>
</html>
