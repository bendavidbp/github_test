<?php

try {
	$server = "10.215.76.250";
    $database = 'catapult';
    $port = 2638;
    $username = "ecrs";
    $password = "catapult";
	
	//from http://php.net/manual/en/ref.pdo-sqlsrv.connection.php
	$conn = new PDO("sqlsrv:Server=$server,$port;Database=$database", "$username", "$password");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
}  

catch(Exception $e)  {   
	die( print_r( $e->getMessage() ) );   
}  

$sql = "SELECT * FROM InventoryLabelFields";

$stmt = $dbh->sqlsrv_prepare("SELECT * FROM WorksheetPriceChangeData");

$stmt->sqlsrv_execute();
    while ($row = $stmt->fetch()) {
      print_r($row);
    }
?>
