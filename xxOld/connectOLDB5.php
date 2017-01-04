<?php
 
	try {
		
		$server_name = "10.215.76.250";
		$port_number = 2638;
		$database_name = "catapult";
		$username = "ecrs";
		$password = "catapult";

		$conn = new PDO("sqlsrv:server=$server_name;database=$database_name", "$username", "$password");
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

	}
	
	catch( PDOException $e ) {  
	
		die( "Error connecting to SQL Server" );   
	
	}  
  
	echo "Connected to SQL Server\n";  

?>
