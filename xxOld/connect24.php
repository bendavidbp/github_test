<?php
		//Display All Errors
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		echo "Cannon <br />";

	//Try the Connection
	try {
		//Connection Variables
		$dsn = "odbc:Prototype";
		$database = 'catapult';
		$username = "ecrs";
		$password = "catapult";

		//Connection String
		$conn = new PDO($dsn, $username, $password);
		
		//Initiating Error Detection
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 	
	}
	
	//Catch exceptions to the Try
	catch(Exception $e)  {   
		echo "Invalid Connection";
		die( print_r( $e->getMessage() ) );   
	}  

	//Prepare SQL Statement
	//$stmt = $conn->prepare("SELECT * FROM WorksheetPriceChangeData");

	//Execute SQL Statement
	//$stmt->execute();
	//	while ($row = $stmt->fetch()) {
	//	  print_r($row);
	//	}
		echo "Connected Successfully";
?>
