<?php
// gives us less repetative code
include_once "navPart.php";

// we can easily connect to the database class and fetch data from their
include_once("database.php");
$setDb = configuration::connection_database();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Category Page</title>
	</head>
	<body>
		<main>
        <?php
		// we get the auction details from refrence of category
    		$cat_id = $_GET['newPage'];
    		$sql = $setDb->prepare("
    			SELECT * FROM auction WHERE categoryId=?;
    			");

    		$sql->execute([$cat_id]);
    	 ?>

        <ul class="productList">
			
		<!-- loop to gets the data available in the table -->
			<?php foreach($sql as $val){ ?>
				<li>
				
				<img src="product.png" alt="product name">
					<article>
							<?php
							// we gets the category
								$hjDb= $setDb->prepare("
										SELECT * FROM category WHERE category_id =? LIMIT 1;
									");
								$hjDb->execute([$val['categoryId']]);
							?>

<!-- gets the data from the table -->
						<h2><?php echo $val['auction_title']; ?></h2>
						<!-- to get the category name from their id -->
						<?php foreach($hjDb as $jkl){ ?>
						<h3><?php echo $jkl['categoryName']; }?></h3>

						<p><?php echo $val['descriptionAuction']; ?></p>
						<p class="price"><?php echo $val['bidAmount']; ?></p>
						<!-- takes us to another page which give us more details -->
						<a href="auction.php?auction_id_given=<?php echo $val['auction_id'];?>" class="more auctionLink">More &gt;&gt;</a>
						<br>

					</article>
					<?php } ?>
				</li>
			</ul>

		</main>

	</body>
</html>
