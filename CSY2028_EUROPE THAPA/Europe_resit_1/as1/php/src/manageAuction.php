<?php
// here we get the navigation section
include_once "navPart.php";

// can connect to the database
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

        <!-- tabeling the category and to manage them  -->
            <table>
                <tr>
                <td><h3>Auction Name</h3></td>
                <td><h3>Delete</h3></td><br>
                <td><h3>Edit</h3></td>
                </tr>

            <?php

// gets the auction details listed
            $sql= $setDb->prepare("SELECT * FROM auction WHERE createdBy=?;");
            $sql->execute([$_SESSION["loginUserKoName"]]);
            foreach ($sql as $hj) { ?>
                <tr>
                <td><h4><?php echo $hj['auction_title']; ?></h4></td>
                <td><a href="deleteAuction.php?removeAuction=<?php echo $hj['auction_id'];?>">Delete</a></td>
                <td><a href="editAuction.php?modifyAuction=<?php echo $hj['auction_id'];?>">Edit</a></td>
                </tr>

                <?php } ?>
            </table>

		</main>

	</body>
</html>
