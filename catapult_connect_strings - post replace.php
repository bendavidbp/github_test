<?php
	
	//[BD]---Display All Errors
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo "Boom! <br /><br />";

	//[BD]---Try the Connection
	try {
		
		//Connection Variables
		$dsn = "odbc:Database";
		$username = "user";
		$password = "password";

		//Connection String
		$conn = new PDO($dsn, $username, $password);
				
		//Initiating Error Detection
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 	
	}
	
	//[BD]---Catch exceptions to the Try
	catch(Exception $e)  {   
		echo "Invalid Connection";
		//Print Error Messages
		die( print_r( $e->getMessage() ) );   
	}  

	//[BD]---SQL Statement(s)
	
/* 
----------List of Tables---------- 
*/

	$stmt = $conn->prepare("SELECT * FROM sysobjects WHERE type = 'U'");
	
	//[BD]---Execute SQL Statement
	$stmt->execute();
		while ($row = $stmt->fetch()) {
		  print_r($row);
		  	echo "<br />";
		}
		
	echo "<br />Connected Successfully";
?>
