<?php
// given the configuration part of the database
class configuration{
	public static function connection_database(){
		// server is defined
		$server="mysql";
		// user is defined
		$user="root";
		$password="MYSQL_ROOT_PASSWORD";
		// database name is given
		$database_name="assignment1";

		// here we have used PDO in mysql
		$connection=new PDO("mysql:host=$server;dbname=$database_name",$user,$password);
		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);	

		return $connection;
	}
}

?>