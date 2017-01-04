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
    $dbh = new PDO ("sqlsrv:Server=$hostname:$port;Database=$dbname","$username","$pw");
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

    //This statement shows all [U]ser tables in the Catapult Database $stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");
    //$stmt = $dbh->prepare("SELECT * FROM sysobjects WHERE type = 'U'");

    //This statement selects the product name that is attached to the appropriate UPC code:
    //$stmt = $dbh->prepare("SELECT INV_Name FROM StockInventory WHERE INV_ScanCode=766529000005");

    //This statement shows all worksheets
    $stmt = $dbh->prepare("SELECT * FROM InventoryLabelFields");

    //This statement selects the worksheets with the identified WRK_Number ID
    //$stmt = $dbh->prepare("SELECT * FROM Worksheets WHERE WRK_Number='CW0LSGM4'");

    //This statement shows all price and cost change worksheet data
    $stmt = $dbh->prepare("SELECT * FROM WorksheetPriceChangeData");

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
