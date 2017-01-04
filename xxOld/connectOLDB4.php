<?php
  //try {
	/*
    $hostname = "11.111.11.111";
    $dbname = 'mydatabase';
    $port = 1234;
    $username = "myusername";
    $pw = "mypassword";
	*/
	
	$server_name = "BRIARPATCH\CSS";
	$port_number = 2638;
	$database_name = "catapult";
	$username = "ecrs";
	$password = "catapult";
	$connection_info = array( "Database"=>"catapult", "UID"=>"ecrs", "PWD"=>"catapult" );
	
	$conn = sqlsrv_connect( $server_name, $connection_info );
	
	//$dbh = new PDO("sqlsrv:server=THIS\SERVER,1234;Database=mydatabase", "myusername", "mypassword");
    //$stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");
	
	//*if( $conn === false) {
	//*	die( print_r( sqlsrv_errors(), true));
	//*}
	
	//*$sql = "SELECT * FROM sysobjects WHERE type = 'U'";
	
	
	
/*
	sqlsrv_prepare ( $dbh , $sql [, array $params [, array $options ]] )
	
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      print_r($row);
    }

    unset($dbh); unset($stmt);
	}

	catch (PDOException $e) {
		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
		exit;
	}
*/
?>
