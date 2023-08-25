<?php
// starting of session
session_start();
//connecting 
include_once("database.php");
$sql_part = configuration::connection_database();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<link rel="stylesheet" href="ibuy.css" />
	</head>

	<body>
		<header>
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form action="#">
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" name="submit" value="Search" />
			</form>
		</header>

        <?php
        // check for session
        if(isset($_SESSION['uNameAdmin'])){ ?>

        <nav>
            <ul>
				<li><a class="categoryLink" href="adminCategories.php">Categories</a></li>
                <li><a class="categoryLink" href="addCategory.php">Add Categories</a></li>
                <li><a class="categoryLink" href="logout.php">Logout</a></li>
				
			</ul>
		</nav>
            
        <?php 
        }
        else{

        
        ?>

		<nav>
            <ul>
				<?php
				// gets the categories listed in navigation section fetched from the database
				        $sql= $sql_part->prepare("SELECT * FROM category");

			            $sql->execute();

		             foreach($sql as $need){ ?>

					<li><a class="categoryLink" href="category.php?newPage=<?php echo $need['category_id'];?>"><?php echo $need['categoryName']; ?></a></li>
				<?php } ?>
			</ul>
		</nav>

        <?php } ?>

        

		<img src="banners/1.jpg" alt="Banner" />
    </body>

	<?php
        // checks for the session 
        if(isset($_SESSION['loginUserKoName'])){ ?>

        <nav>
            <ul>
				<li><a class="categoryLink" href="addAuction.php">Add Auction</a></li>
                <li><a class="categoryLink" href="manageAuction.php">My Auction</a></li>
                <li><a class="categoryLink" href="logout.php">Logout</a></li>
				
			</ul>
		</nav>
            
        <?php 
        }
        
     ?>

    

</html>