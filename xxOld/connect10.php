<?php

    //$hostname = "10.215.76.250";
    //$dbname = 'catapult';
    //$port = 2638;
    //$username = "ecrs";
    //$pw = "catapult";
	
	/*-------------------------------------------------------------------------------------------------
	$conn = new PDO("sqlsrv:Server=10.215.76.250:2638;Database=catapult", "ecrs", "catapult");
	
	$myID = 0;
	$query = "SELECT * FROM sysobjects WHERE type = 'U'";
	$stmt = sqlsrv_prepare($conn, $query, array(&$myID));
	$result = sqlsrv_execute($stmt);
	$row = sqlsrv_fetch_array($stmt);
	---------------------------------------------------------------------------------------------------*/
	
	function OpenConnection()  
    {  
        try  
        {  
            $serverName = "tcp:10.215.76.250,2638";  
            $connectionOptions = array("Database"=>"catapult",  
                "Uid"=>"ecrs", "PWD"=>"catapult");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false)  
                die(FormatErrors(sqlsrv_errors()));  
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }  
	
	function ReadData()  
    {  
        try  
        {  
            $conn = OpenConnection();  
            $tsql = "SELECT INV_Name FROM StockInventory WHERE INV_ScanCode=766529000005";  
            $getProducts = sqlsrv_query($conn, $tsql);  
            if ($getProducts == FALSE)  
                die(FormatErrors(sqlsrv_errors()));  
            $productCount = 0;  
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))  
            {  
                echo($row['INV_Name']);  
                echo("<br/>");  
                $productCount++;  
            }  
            sqlsrv_free_stmt($getProducts);  
            sqlsrv_close($conn);  
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
		
ReadData();

?>
		