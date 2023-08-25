<?php

// here we get to connect to the databse
require 'database.php';
$sql_con = configuration::connection_database();

// gets the category id
	$gh = $_GET['removedCat']; 

	if(dlta($sql_con,$gh)){
		header("Location:adminCategories.php");
	}

	function dlta($sql_con,$ubt){
		// fire to remove from the database
		$sql_term=$sql_con->prepare("DELETE FROM category WHERE category_id=?");
		return $sql_term->execute([$ubt]);	
	}

?>