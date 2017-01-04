<!doctype html>
<head>
<style type="text/css">body {font-family: courier} .headdiv {width: 50%; margin: auto; text-align: center}</style>
</head>
<?php
  try {
    $hostname = "10.215.76.250";
    $dbname = 'catapult';
    $port = 2638;
    $username = "ecrs";
    $pw = "catapult";
	
	$dbh = new PDO("sqlsrv:server=BRIARPATCH\CSS,2638;Database=catapult", "ecrs", "catapult");
    $stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");

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

?>
