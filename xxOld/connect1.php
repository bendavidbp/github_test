<!doctype html>
<head>
<style type="text/css">body {font-family: courier} .headdiv {width: 50%; margin: auto; text-align: center}</style>
</head>
<?php
  try {
	  
	//---	Variables for Connection Established	---//
	  
    $hostname = "10.215.76.250";
    $dbname = 'catapult';
    $port = 2638;
    $username = "ecrs";
    $pw = "catapult";
	$connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";

    $dbh = odbc_connect($connection_string,$username,$pw);

	//---	Connection Confirmation Message		---//
	
	echo "<div class='headdiv'>";
    echo "----------";
    echo "<br>";
    echo "Cannon 0.1";
    echo "<br>";
    echo "----------";
    echo "<br>";
    echo "<br>";
    echo "</div>";
    echo "<br>";
    echo "Boom!";
    echo "<br>";
    echo "<br>";
    echo "Connected successfully...";
    echo "<br>";
    echo "<br>";

	//---	Sample ODBC Query	---//
	
	//OLD	$stmt = odbc_prepare($dbh, "");
	
	$query=odbc_exec("SELECT * FROM table WHERE userinput=".$hopefully_escaped_user_input);
		while($row=odbc_fetch_array($query) {
			//do stuff with $row
		}
	
	unset($dbh); unset($stmt);
  }

  catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

?>
