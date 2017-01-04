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
	$connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $dbh = odbc_connect($connection_string,$username,$pw);

    $stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");

    $stmt->execute();
    while ($row = $stmt->fetch()) {
      print_r($row);
    }
	echo "test";
	unset($dbh); unset($stmt);
  }

  catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

?>
