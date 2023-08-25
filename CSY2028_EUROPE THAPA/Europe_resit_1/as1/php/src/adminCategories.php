<?php
// included the header section of the page
include_once "navPart.php";

include_once("database.php");
$setDb = configuration::connection_database();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Categories Page</title>
	</head>
	<body>
		<main>

        <!-- created the tabel to get the categories listed -->
            <table>
                <tr>
                <td><h3>Category List</h3></td>
                <td><h3>Delete</h3></td><br>
                <td><h3>Edit</h3></td>
                </tr>

            <?php

// fetched category from the tabel
            $sql= $setDb->prepare("SELECT * FROM category;");
            $sql->execute();
            // foreach loop to list category till the end
            foreach ($sql as $hj) { ?>
                <tr>
                <td><h4><?php echo $hj['categoryName']; ?></h4></td>
                <!-- here we get the edit and delete section -->
                <td><a href="deleteCategory.php?removedCat=<?php echo $hj['category_id'];?>">Delete</a></td>
                <td><a href="editCategory.php?modifyCat=<?php echo $hj['category_id'];?>">Edit</a></td>
                </tr>

                <?php } ?>
            </table>

		</main>

	</body>
</html>
