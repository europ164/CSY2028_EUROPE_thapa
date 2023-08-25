<?php

// here we get to connect to the databse
require 'database.php';
$sql_con = configuration::connection_database();

// GET gives us the passed id parameter
	$removeAuction = $_GET['removeAuction'];

	// function for deletion of auction checked
	if(aucD($sql_con,$removeAuction)){
			header("Location:manageAuction.php");
	}

	// function for deletion of auction 
	function aucD($sql_con,$ubt){
		// query fire to delete the respective auction
		$sql_term=$sql_con->prepare("DELETE FROM auction WHERE auction_id=?");
		return $sql_term->execute([$ubt]);	
	}

?>