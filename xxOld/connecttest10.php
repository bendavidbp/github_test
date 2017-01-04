<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Test1";

try {
	$server = "BRIARPATCH\CSS";
	//$server = "10.215.76.250";
	//$server = "11.123.123.123";
    $database = 'catapult';
		//$port = 2638;
	$port = 1433;
    $username = "ecrs";
    $password = "catapult";
	
	//from http://php.net/manual/en/ref.pdo-sqlsrv.connection.php
		//$conn = new PDO("sqlsrv:Server=$server,$port;Database=$database", "$username", "$password");
		//$conn = new PDO("sqlsrv:Server=$server,$port;Database=$database", "$username");
		//$conn = new PDO("sqlsrv:Server=$server,$port;Database=$database", "$username");
	//$conn = new PDO("odbc:Driver={SQL Server};Server=10.215.76.250;Port=2638;Database=catapult; Uid=ecrs;Pwd=catapult;");
	
	$conn = odbc_connect("Catapult");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	echo "Test2";
}  

catch(Exception $e)  {   
	die( print_r( $e->getMessage() ) );   
	echo "Test3";
}  

//$sql = "SELECT * FROM InventoryLabelFields";

$stmt = $dbh->sqlsrv_prepare("SELECT * FROM WorksheetPriceChangeData");

$stmt->sqlsrv_execute();
    while ($row = $stmt->fetch()) {
      print_r($row);
    }
	echo "Test4";
?>
