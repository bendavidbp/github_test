<?php
  try {
	
    $hostname = "11.111.11.111";
    $dbname = 'mydatabase';
    $port = 1234;
    $username = "myusername";
    $pw = "mypassword";
	
	$dbh = new PDO("sqlsrv:server=THIS\SERVER,1234;Database=mydatabase", "myusername", "mypassword");
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
