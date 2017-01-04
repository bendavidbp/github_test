<!doctype html>
<head>
<style type="text/css">body {font-family: courier} .headdiv {width: 50%; margin: auto; text-align: center}</style>
</head>
<?php
  echo "test";
  try {
    $hostname = "10.215.76.250";
	//$hostname = "BRIARPATCH/CSS";
    $dbname = 'catapult';
    //$port = 2638;
	$port = 1433;
    $username = "ecrs";
    $pw = "catapult";
	//$dbh = new PDO ("sqlsrv:Server=$hostname:$port;Database=$dbname","$username","$pw");
	$dbh = new PDO("sqlsrv:Server={$hostname};Database={$dbname};", $username, $pw);

	//$stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");
	$stmt = $dbh->prepare("SELECT INV_Name FROM StockInventory WHERE INV_ScanCode=766529000005");

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
/*

Failed to get DB handle: SQLSTATE[08001]: [Microsoft][ODBC Driver 11 for SQL Server]Named Pipes Provider: Could not open a connection to SQL Server [2].

*/
  
?>
