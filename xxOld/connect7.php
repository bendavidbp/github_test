<!doctype html>
<head>
<style type="text/css">body {font-family: courier} .headdiv {width: 50%; margin: auto; text-align: center}</style>
</head>
<?php

	$serverName = "briarpatch\css";
	$connectionInfo = array( "Database"=>"catapult", "UID"=>"ecrs", "PWD"=>"catapult");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );
	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
		print_r ("nope");
	}
	
	$sql = "SELECT * FROM sysobjects WHERE type = 'U'"
	$stmt = sqlsrv_prepare( $conn, $sql, array( &$row ));
	
	foreach ( $rows as &$row ) {
			print_r($row);
	}
	
	$row = $rows['start'];
	if( sqlsrv_execute( $stmt ) === false ) {
          die( print_r( sqlsrv_errors(), true));
	}

	/*
	$stmt->execute();
		while ($row = $stmt->fetch()) {
		print_r($row);
    }
	*/
	/*
	$sql = "UPDATE Table_1
			SET OrderQty = ?
			WHERE SalesOrderID = ?";

	// Initialize parameters and prepare the statement. 
	// Variables $qty and $id are bound to the statement, $stmt.
	$qty = 0; $id = 0;
	$stmt = sqlsrv_prepare( $conn, $sql, array( &$qty, &$id));
	if( !$stmt ) {
		die( print_r( sqlsrv_errors(), true));
	}
	

	// Set up the SalesOrderDetailID and OrderQty information. 
	// This array maps the order ID to order quantity in key=>value pairs.
	$orders = array( 1=>10, 2=>20, 3=>30);

	// Execute the statement for each order.
	foreach( $orders as $id => $qty) {
		// Because $id and $qty are bound to $stmt1, their updated
		// values are used with each execution of the statement. 
		if( sqlsrv_execute( $stmt ) === false ) {
			  die( print_r( sqlsrv_errors(), true));
		}
	}
  }*/

?>
