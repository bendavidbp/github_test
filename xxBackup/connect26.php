<?php
		//Display All Errors
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		echo "Cannon <br /><br />";

	//Try the Connection
	try {
		/*
		//Connection Variables
		$dsn = "odbc:Prototype";
		$database = 'catapult';
		$username = "ecrs";
		$password = "catapult";

		//Connection String
		$conn = new PDO($dsn, $username, $password);
		*/
		
		$server = "10.215.76.250,2638";
		$database = 'catapult';
		$port = 2638;
		$username = "ecrs";
		$password = "catapult";

		//Connection String
		$conn = new PDO ("odbc:Server=$server;Database=$database","$username","$password");
		
		//Initiating Error Detection
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 	
	}
	
	//Catch exceptions to the Try
	catch(Exception $e)  {   
		echo "Invalid Connection";
		die( print_r( $e->getMessage() ) );   
	}  

	//Prepare SQL Statement
	//$stmt = $conn->prepare("SELECT * FROM sysobjects WHERE type = 'U'");
	//$stmt = $conn->prepare("SELECT * FROM sysobjects");
	//$stmt = $conn->prepare("sp_helpdb");
	//$stmt = $conn->prepare("Select distinct sysobjects.name");
	//$stmt = $conn->prepare("select convert(varchar(30),o.name) AS table_name from sysobjects o where type = 'U'order by table_name");
	
	
	//XX $stmt = $conn->prepare("SELECT * FROM InventoryLabelFields");
	//XX $stmt = $conn->prepare("SELECT INV_Name FROM StockInventory WHERE INV_ScanCode=766529000005");

	//Execute SQL Statement
	$stmt->execute();
		while ($row = $stmt->fetch()) {
		  print_r($row);
		  	echo "<br />";
		}
		echo "<br />Connected Successfully";
?>
