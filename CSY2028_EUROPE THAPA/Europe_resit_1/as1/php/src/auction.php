<?php
// gives us less repetative code
include_once "navPart.php";

//we can have the database connection
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
        // now from here we can get teh auction details
    		$auc_id = $_GET['auction_id_given'];
    		$sql = $setDb->prepare("
    			SELECT * FROM auction WHERE auction_id=?;
    			");

    		$sql->execute([$auc_id]);
    	 ?>

<!-- runs the auction section part -->
            <?php foreach($sql as $val){ ?>
            <article class="product">
            

                <?php
					//gets details from the category section
					$hjDb= $setDb->prepare("SELECT * FROM category WHERE category_id =? LIMIT 1;");
					$hjDb->execute([$val['categoryId']]);
				?>

                <img src="product.png" alt="product name">
                <section class="details">
                    <h2><?php echo $val['auction_title']; ?></h2>
                    <?php foreach($hjDb as $jkl){ ?>
						<h3><?php echo $jkl['categoryName']; }?></h3>
                    <p>Auction created by <a href="#"><?php echo $val['createdBy']; ?></a></p>
                    <p class="price"><?php echo "Bid amount: ". $val['bidAmount']; ?></p>

                    <?php
                        $end = $val['endDate']; 
                        $common_time = "00:00:00";

                        $given_date = new DateTime($end . ' ' . $common_time);

                        // Get the current date and time as a DateTime object.
                        $current_date = new DateTime();

                        // Calculate the interval (difference) between the given date and the current date.
                        $interval = $given_date->diff($current_date);

                        // Access the difference components (years, months, days).
                        $years = $interval->y;
                        $months = $interval->m;
                        $days = $interval->d;

                        // Output the difference.
                        $remainedDate = "$months months, $days days";
                    ?>

                    <time><?="Time Remains: ".$remainedDate?></time>

                    <form action="#" class="bid">
                        <input type="text" name="bid" placeholder="Enter bid amount" />
                        <input type="submit" value="Place bid" />
                    </form>
                </section>
                <section class="description">
                <p><?php echo $val['descriptionAuction']; ?></p>

                </section>
                

                <section class="reviews">
                    <h2>Reviews of User.Name </h2>
                    <ul>
                        <li><strong>Ali said </strong> great ibuyer! Product as advertised and delivery was quick <em>29/09/2019</em></li>
                        <li><strong>Dave said </strong> disappointing, product was slightly damaged and arrived slowly.<em>22/07/2019</em></li>
                        <li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2019</em></li>

                    </ul>

                    <form>
                        <label>Add your review</label> <textarea name="reviewtext"></textarea>

                        <input type="submit" name="submit" value="Add Review" />
                    </form>
                </section>

            </article>

            <?php } ?>

		</main>

	</body>
</html>
