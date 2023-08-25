<?php
// here we get the navigation section
include_once "navPart.php";
// we get to connect to the database
include_once("database.php");
$setDb = configuration::connection_database();

?>

<!DOCTYPE html>
<html>

		<main>

		<?php
        // checks the session is on or not 
        if(!isset($_SESSION['loginUserKoName'] ) && !isset($_SESSION['uNameAdmin'] )){ ?>

        <nav>
			<ul>
				<li><a class="categoryLink" href="Alogin.php">Admin login</a></li>
				<br>
				<br>
				<li><a class="categoryLink" href="login.php">User Login</a></li>
				<br>
				<br>
				<li><a class="categoryLink" href="register.php">Register User</a></li>
			</ul>
		</nav>
            
        <?php 
        }
        ?>

			<h1>Latest Listings / Search Results / Category listing</h1>

			<?php
			//sql to get the latest auction details 
				$sql_part= $setDb->prepare("
				        SELECT * FROM auction ORDER BY auction_id DESC LIMIT 10;
				    ");
				$sql_part->execute();
			?>

			<ul class="productList">
			
			<?php foreach($sql_part as $val){ ?>
				<li>
				
				<img src="product.png" alt="product name">
					<article>
							<?php
							//sql to get category
								$hjDb= $setDb->prepare("
										SELECT * FROM category WHERE category_id =? LIMIT 1;
									");
								$hjDb->execute([$val['categoryId']]);
							?>

<!-- all the details of the auction has beeen their -->
						<h2><?php echo $val['auction_title']; ?></h2>
						<?php foreach($hjDb as $jkl){ ?>
						<h3><?php echo $jkl['categoryName']; }?></h3>

						<!-- description of the auction -->
						<p><?php echo $val['descriptionAuction']; ?></p>
						<p class="price"><?php echo $val['bidAmount']; ?></p>
						<a href="auction.php?auction_id_given=<?php echo $val['auction_id'];?>" class="more auctionLink">More &gt;&gt;</a>
						<br>

						
					</article>
					<?php } ?>
				</li>
			</ul>

			<hr />

			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>