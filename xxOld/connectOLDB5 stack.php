<?php
 
	try {
		
		$server_name = "MY\SERVER,1234";
		$database_name = "myDatabase";
		$username = "myUsername";
		$password = "myPassword";

		$conn = new PDO("sqlsrv:server=$server_name;database=$database_name", "$username", "$password");
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

	}
	
	catch( PDOException $e ) {  
	
		die( "Error connecting to SQL Server" );   
	
	}  
  
	echo "Connected to SQL Server\n";  

?>
