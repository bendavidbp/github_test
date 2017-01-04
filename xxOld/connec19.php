<?php
		//Display All Errors
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		echo "Test 1";

	//Try the Connection
	try {
		//Connection Variables
		$server = "10.215.76.250,2638";
		$database = 'catapult';
		$port = 2638;
		$username = "ecrs";
		$password = "catapult";

		//Connection String
		$conn = new PDO ("sqlsrv:Server=$server;Database=$database","$username","$password");
		
		//Initiating Error Detection
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 	
	}
	
	//Catch exceptions to the Try
	catch(Exception $e)  {   
		echo "Test3";
		die( print_r( $e->getMessage() ) );   
	}  

	//Prepare SQL Statement
	$stmt = $conn->prepare("SELECT * FROM WorksheetPriceChangeData");

	//Execute SQL Statement
	$stmt->execute();
		while ($row = $stmt->fetch()) {
		  print_r($row);
		}
		echo "Test4";
?>
