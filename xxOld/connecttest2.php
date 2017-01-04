<?php
	
	echo "test";
	
try {
	$server = "10.215.76.250";
	//$server = "prototype";
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
$stmt = sqlsrv_prepare( $conn, $sql );

if( !$stmt ) {
    die( print_r( sqlsrv_errors(), true));
}

?>
