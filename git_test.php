		<?php
			/* 
			
			[BD]---This Connection works on Windows Server 2012 R2 in PHP 5.X-7.X (The PHP version running in x86 architecture mode).  
			
			On a fresh install in IIS you may first need to change the version of PHP to 5.X or 7.X (the x86 architecture version of 7.0 is necessary to handshake with the ECRS database) by going into >IIS Manager >PHP Manager and selecting "Change PHP Version".  After this it may be neccesary to create an ODBC DSN by running the ODBC Data-Sources 32-bit executable and creating a connection called "Catapult" (if the name is different the variable will need to be adjusted below).  This connection needs to be created with the SQL Anywhere 12 Driver, and you may need to install a trial version of SQL Anywhere 12 to gain access to that driver. The connection is created with a server name "catapult" and database name "catapult" with the credentials as listed in the Pricing Network Data file. 
			
			Next go to IIS Manager> Authentication.  Select "Anonymous Authentication", click "Edit" and make sure "Application Pool Identity" is checked.
			
			After this you will need to configure PHP to use the DSN by installing and initiating the odbc_pdo driver/extension.  First make sure the php_pdo_odbc.dll file is in your /ext directory off of the main PHP directory of the version you are using (make sure you are making these adjustements in the "Program Files (X86)" folder, or else you are adjusting the now inactive x64 PHP version) - or if it is not there download it.  Once the file is in the directory edit the php.ini file in the main PHP directory to include the following extension line in the extension block at the end of the file: extension=php_pdo_odbc.dll.  Restart the computer and the odbc_pdo driver should now be enabled.  The below connection script should now work.
			
			If this server ever migrates to linux there is a successful connection script in linux (CentOS 6-7) written for PHP 5.X and the dblib driver/extension included in this folder as "catapult_connect_linux".  To use this script you will need to install and initiate the dblib driver.
				
			*/
			
			//[BD]---Display All Errors
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			echo "Boom! <br /><br />";

			//[BD]---Try the Connection
			try {
				
				//Connection Variables
				$dsn = "odbc:Catapult";
				$username = "ecrs";
				$password = "catapult";

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
			$stmt = $conn->prepare("SELECT * FROM sysobjects WHERE type = 'U'");

			//[BD]---Execute SQL Statement
			$stmt->execute();
				while ($row = $stmt->fetch()) {
				  print_r($row);
					echo "<br />";
				}
				
			echo "<br />Connected Successfully!";

echo "LET'S BRANCH THIS LALALALALALALA";
AND THEN TRULY MERGE!
OR NOT?????

		?>
