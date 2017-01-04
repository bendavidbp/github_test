<?php
	/* 
	
	[BD]---This Connection works on Windows Server 2012 R2 in PHP 5.X-7.X (The PHP version running in x86 architecture mode).  
	
	On a fresh install in IIS you may first need to change the version of PHP to 5.X or 7.X (the x86 architecture version of 7.0 is necessary to handshake with the ECRS database) by going into >IIS Manager >PHP Manager and selecting "Change PHP Version".  After this it may be neccesary to create an ODBC DSN by running the ODBC Data-Sources 32-bit executable and creating a connection called "Catapult" (if the name is different the variable will need to be adjusted below).  This connection needs to be created with the SQL Anywhere 12 Driver, and you may need to install a trial version of SQL Anywhere 12 to gain access to that driver. The connection is created with a server name "catapult" and database name "catapult" with the credentials as listed in the Pricing Network Data file. 
	
	Next go to IIS Manager> Authentication.  Select "Anonymous Authentication", click "Edit" and make sure "Application Pool Identity" is checked.
	
	After this you will need to configure PHP to use the DSN by installing and initiating the odbc_pdo driver/extension.  First make sure the php_pdo_odbc.dll file is in your /ext directory off of the main PHP directory of the version you are using (make sure you are making these adjustements in the "Program Files (X86)" folder, or else you are adjusting the now inactive x64 PHP version) - or if it is not there download it.  Once the file is in the directory edit the php.ini file in the main PHP directory to include the following extension line in the extension block at the end of the file: extension=php_pdo_odbc.dll.  Restart the computer and the odbc_pdo driver should now be enabled.  The below connection script should now work.
	
	If this server ever migrates to linux there is a successful connection script in linux (CentOS 6-7) written for PHP 5.X and the dblib driver/extension included in this folder as "catapult_connect_linux".  To use this script you will need to install and initiate the dblib driver.
		
	*/
	
	//[BD]---Display All Errors
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo "Boom! <br /><br />";

	//[BD]---Try the Connection
	try {
		
		//Connection Variables
		$dsn = "odbc:Catapult";
		$username = "ecrs";
		$password = "catapult";

		//Connection String
		$conn = new PDO($dsn, $username, $password);
				
		//Initiating Error Detection
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 	
	}
	
	//[BD]---Catch exceptions to the Try
	catch(Exception $e)  {   
		echo "Invalid Connection";
		//Print Error Messages
		die( print_r( $e->getMessage() ) );   
	}  

	//[BD]---SQL Statement(s)
	
/* 
----------List of Tables---------- 
*/

	$stmt = $conn->prepare("SELECT * FROM sysobjects WHERE type = 'U'");



							//----------          BEGIN INVENTORY LABEL SEARCH          ----------//
/* 							
----------Something to do with Inventory Label Fields(?)----------
*/
	
	//$stmt = $conn->prepare("SELECT * FROM InventoryLabelFields");
	
/* 
----------Something to do with Inventory Lavel Worksheet Data----------
Three Sample Lines:
Array ( [IWD_PK] => 231660 [0] => 231660 [IWD_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-17 09:51:05.134691 [2] => 2016-10-17 09:51:05.134691 ) 
Array ( [IWD_PK] => 231661 [0] => 231661 [IWD_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-17 09:51:05.176691 [2] => 2016-10-17 09:51:05.176691 ) 
Array ( [IWD_PK] => 231737 [0] => 231737 [IWD_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-18 10:05:11.540126 [2] => 2016-10-18 10:05:11.540126 ) 
---------------------------------------------------------------------
*/

	//$stmt = $conn->prepare("SELECT * FROM D_InventoryLabelWorksheetData");
	
/*--------------------------------------------------------------------------------------------------
Attempting to select Worksheet Data that does not have a delete timestamp.  This doesn't return any results today.
*/
	
	//$stmt = $conn->prepare("SELECT * FROM D_InventoryLabelWorksheetData where CAST(DEL_Timestamp as CHAR) is NULL");

/* 
----------Something to do with Inventory Worksheets----------
Three Sample Lines:
Array ( [ILW_PK] => 11778 [0] => 11778 [ILW_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-18 10:36:58.746041 [2] => 2016-10-18 10:36:58.746041 ) 
Array ( [ILW_PK] => 11787 [0] => 11787 [ILW_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-19 11:54:08.777262 [2] => 2016-10-19 11:54:08.777262 ) 
Array ( [ILW_PK] => 11789 [0] => 11789 [ILW_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-19 12:22:36.408151 [2] => 2016-10-19 12:22:36.408151 ) 
-------------------------------------------------------------
*/

	//$stmt = $conn->prepare("SELECT * FROM D_InventoryLabelWorksheets");
	
/*-----------------------------------------------------------
Attempting to select Worksheet Data that does not have a delete timestamp.  This doesn't return any results today.     bn  "is not NULL" works and once again displays data.
-------------------------------------------------------------
*/

	//$stmt = $conn->prepare("SELECT * FROM D_InventoryLabelWorksheets where CAST(DEL_Timestamp as CHAR) is NULL");

/*
AddItemsWorksheet - Attempting to gain information from anything generally related to worksheets
Three Sample Lines:
[AIW_PK] => 2774 [0] => 2774 [AIW_CPK] => 1000 [1] => 1000 [AIW_WRK_FK] => 120232 [2] => 120232 [AIW_WRK_CFK] => 1000 [3] => 1000 [AIW_EMP_FK] => [4] => [AIW_EMP_CFK] => [5] => [AIW_STO_FK] => [6] => [AIW_STO_CFK] => [7] => [AIW_Process] => 1 [8] => 1 ) 
Array ( [AIW_PK] => 2775 [0] => 2775 [AIW_CPK] => 1000 [1] => 1000 [AIW_WRK_FK] => 120233 [2] => 120233 [AIW_WRK_CFK] => 1000 [3] => 1000 [AIW_EMP_FK] => [4] => [AIW_EMP_CFK] => [5] => [AIW_STO_FK] => [6] => [AIW_STO_CFK] => [7] => [AIW_Process] => 1 [8] => 1 ) 
Array ( [AIW_PK] => 2776 [0] => 2776 [AIW_CPK] => 1000 [1] => 1000 [AIW_WRK_FK] => 120234 [2] => 120234 [AIW_WRK_CFK] => 1000 [3] => 1000 [AIW_EMP_FK] => [4] => [AIW_EMP_CFK] => [5] => [AIW_STO_FK] => [6] => [AIW_STO_CFK] => [7] => [AIW_Process] => 1 [8] => 1 ) 
*/
	
	//$stmt = $conn->prepare("SELECT * FROM AddItemsWorksheet");

/*
AddItemsWorksheetData
Sample Line:
[AID_PK] => 1084145 [0] => 1084145 [AID_CPK] => 1000 [1] => 1000 [AID_AIW_FK] => 2841 [2] => 2841 [AID_AIW_CFK] => 1000 [3] => 1000 [AID_ItemID] => 8035 [4] => 8035 [AID_ReceiptAlias] => [5] => [AID_SugRetail] => [6] => [AID_LastCost] => [7] => [AID_BasePrice] => [8] => [AID_AutoDiscount] => [9] => [AID_WeightProfile] => [10] => [AID_Tax1] => [11] => [AID_Tax2] => [12] => [AID_Tax3] => [13] => [AID_AltID] => [14] => [AID_AltReceiptAlias] => [15] => [AID_AltQuantity] => [16] => [AID_SupplierUnitID] => [17] => [AID_SupplierID] => [18] => [AID_SupplierUnit] => [19] => [AID_UnitQuantity] => [20] => [AID_Power1] => [21] => [AID_Power2] => [22] => [AID_Power3] => [23] => [AID_Power4] => [24] => [AID_Power5] => [25] => [AID_Power6] => [26] => [AID_Power7] => [27] => [AID_Power8] => 110216m36bkd [28] => 110216m36bkd [AID_Quantity] => [29] => [AID_Dept] => [30] => [AID_UpdateNote] => [31] => [AID_UpdateFailed] => 0 [32] => 0 [AID_Brand] => [33] => [AID_Name] => [34] => [AID_Size] => [35] => [AID_Memo] => [36] => [AID_IdealMargin] => 0.0000 [37] => 0.0000 [AID_SpecialTender1] => [38] => [AID_SpecialTender2] => [39] => [AID_POSPrompt] => [40] => [AID_Location] => [41] => [AID_ReorderPoint] => [42] => [AID_ReorderConstantLevel] => [43] => [AID_ReorderQuantity] => [44] => [AID_DptNumber] => [45] => [AID_DSDItem] => [46] => [AID_DiscountMultiplier] => 1 [47] => 1 [AID_OrdSuggestedMultiple] => 0 [48] => 0 [AID_OrdAllowOverrideOfMultiple] => [49] => ) 
*/

	//$stmt = $conn->prepare("SELECT * FROM AddItemsWorksheetData");

/*
D_GeneralLedgerWorksheet
Null
*/
	//$stmt = $conn->prepare("SELECT * FROM D_GeneralLedgerWorksheet");
	
/*
D_WorksheetPriceChangeData
Three Sample Lines:
Array ( [WPD_PK] => 470825 [0] => 470825 [WPD_CPK] => 1000 [1] => 1000 [DEL_TimeStamp] => 2011-02-22 12:54:36.707674 [2] => 2011-02-22 12:54:36.707674 ) 
Array ( [WPD_PK] => 470826 [0] => 470826 [WPD_CPK] => 1000 [1] => 1000 [DEL_TimeStamp] => 2011-02-22 12:54:36.725752 [2] => 2011-02-22 12:54:36.725752 ) 
Array ( [WPD_PK] => 470827 [0] => 470827 [WPD_CPK] => 1000 [1] => 1000 [DEL_TimeStamp] => 2011-02-22 12:54:36.728676 [2] => 2011-02-22 12:54:36.728676 ) 
*/
	//$stmt = $conn->prepare("SELECT * FROM D_WorksheetPriceChangeData");

/*
D_Worksheets
Three Sample Lines:
Array ( [WRK_PK] => 120874 [0] => 120874 [WRK_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-14 08:42:36.259631 [2] => 2016-10-14 08:42:36.259631 ) 
Array ( [WRK_PK] => 120901 [0] => 120901 [WRK_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-14 09:53:57.039406 [2] => 2016-10-14 09:53:57.039406 ) 
Array ( [WRK_PK] => 120869 [0] => 120869 [WRK_CPK] => 1000 [1] => 1000 [DEL_Timestamp] => 2016-10-14 11:13:55.783712 [2] => 2016-10-14 11:13:55.783712 ) 

TIMESTAMP IS NULL = NULL
*/
	//$stmt = $conn->prepare("SELECT * FROM D_Worksheets where CAST(DEL_Timestamp as CHAR) is NULL");	

/*
InventoryLabelWorksheetData

!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!THIS IS IT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

This is an inventory label worksheet I created with 55 tags for each product:

Array ( [IWD_PK] => 235552 [0] => 235552 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 42916 [4] => 42916 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.833076 [11] => 2016-12-14 15:51:13.833076 ) 
Array ( [IWD_PK] => 235553 [0] => 235553 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] =In> 1000 [3] => 1000 [IWD_INV_FK] => 8222 [4] => 8222 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.834390 [11] => 2016-12-14 15:51:13.834390 ) 
Array ( [IWD_PK] => 235554 [0] => 235554 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 17044 [4] => 17044 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.835477 [11] => 2016-12-14 15:51:13.835477 ) 
Array ( [IWD_PK] => 235555 [0] => 235555 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 8556 [4] => 8556 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.836566 [11] => 2016-12-14 15:51:13.836566 ) 
Array ( [IWD_PK] => 235556 [0] => 235556 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 5217 [4] => 5217 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.837656 [11] => 2016-12-14 15:51:13.837656 ) 
Array ( [IWD_PK] => 235557 [0] => 235557 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 5216 [4] => 5216 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.838760 [11] => 2016-12-14 15:51:13.838760 ) 
Array ( [IWD_PK] => 235558 [0] => 235558 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 31051 [4] => 31051 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.839865 [11] => 2016-12-14 15:51:13.839865 ) 
Array ( [IWD_PK] => 235559 [0] => 235559 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 31127 [4] => 31127 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.840966 [11] => 2016-12-14 15:51:13.840966 ) 
Array ( [IWD_PK] => 235560 [0] => 235560 [IWD_CPK] => 1000 [1] => 1000 [IWD_ILW_FK] => 11941 [2] => 11941 [IWD_ILW_CFK] => 1000 [3] => 1000 [IWD_INV_FK] => 31052 [4] => 31052 [IWD_INV_CFK] => 1000 [5] => 1000 [IWD_ASC_FK] => [6] => [IWD_ASC_CFK] => [7] => [IWD_LabelQty] => 55 [8] => 55 [IWD_ShelfTagQty] => 0 [9] => 0 [IWD_SignQty] => 0 [10] => 0 [IWD_Timestamp] => 2016-12-14 15:51:13.842024 [11] => 2016-12-14 15:51:13.842024 ) 

*/
	//$stmt = $conn->prepare("SELECT * FROM InventoryLabelWorksheetData");

/*
InventoryLabelWorksheets

!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!THIS IS IT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
This is the worksheet I created for the 55 tags:

Array ( [ILW_PK] => 11941 [0] => 11941 [ILW_CPK] => 1000 [1] => 1000 [ILW_WRK_FK] => 123531 [2] => 123531 [ILW_WRK_CFK] => 1000 [3] => 1000 [ILW_LBL_FK_Item] => [4] => [ILW_LBL_CFK_Item] => [5] => [ILW_LBL_FK_ShelfTag] => [6] => [ILW_LBL_CFK_ShelfTag] => [7] => [ILW_LBL_FK_Sign] => [8] => [ILW_LBL_CFK_Sign] => [9] => [ILW_STO_FK] => 1 [10] => 1 [ILW_STO_CFK] => 1000 [11] => 1000 [ILW_Timestamp] => 2016-12-14 15:50:12.436703 [12] => 2016-12-14 15:50:12.436703 ) 

*/

	//$stmt = $conn->prepare("SELECT * FROM InventoryLabelWorksheets");

/*--------------------------------------------------------------------------------------------------
WORKSHEET NAME LOCATED:
Array ( [WRK_PK] => 123531 [0] => 123531 [WRK_Name] => ~DATABASE TEST BD [1] => ~DATABASE TEST BD [WRK_Number] => ST0XXQIW [2] => ST0XXQIW [WRK_WST_FK] => 9 [3] => 9 [WRK_CPK] => 1000 [4] => 1000 [WRK_Committed] => 0 [5] => 0 [WRK_TimestampCommitted] => [6] => [WRK_EMP_FK_Started] => 152 [7] => 152 [WRK_EMP_CFK_Started] => 1000 [8] => 1000 [WRK_EMP_FK_Committed] => [9] => [WRK_EMP_CFK_Committed] => [10] => [WRK_EMP_FK_Assigned] => [11] => [WRK_EMP_CFK_Assigned] => [12] => [WRK_Status] => Pending [13] => Pending [WRK_StartDate] => [14] => [WRK_EndDate] => [15] => [WRK_Timestamp] => 2016-12-14 15:50:12.431667 [16] => 2016-12-14 15:50:12.431667 [WRK_Visible] => 1 [17] => 1 ) 
*/
	
	//$stmt = $conn->prepare("SELECT * FROM Worksheets");
	
/*--------------------------------------------------------------------------------------------------
WORKSHEET TYPES - FOUND INVENTORY LABEL:
Array ( [WST_PK] => 9 [0] => 9 [WST_Name] => Inventory Label [1] => Inventory Label [WST_Form] => frmInventoryLabelWorksheet [2] => frmInventoryLabelWorksheet [WST_Table] => v_InventoryLabelWorksheets [3] => v_InventoryLabelWorksheets [WST_TablePKfield] => ILW_PK [4] => ILW_PK [WST_TableCPKfield] => ILW_CPK [5] => ILW_CPK [WST_WorksheetFKfield] => ILW_WRK_FK [6] => ILW_WRK_FK [WST_WorksheetCFKfield] => ILW_WRK_CFK [7] => ILW_WRK_CFK [WST_CAT_FK] => 12 [8] => 12 [WST_CAT_CFK] => 0 [9] => 0 [WST_DBTable] => InventoryLabelWorksheets [10] => InventoryLabelWorksheets [WST_DataTable] => v_InventoryLabelWorksheetData [11] => v_InventoryLabelWorksheetData [WST_DBDataTable] => InventoryLabelWorksheetData [12] => InventoryLabelWorksheetData [WST_WSTablePrefix] => ILW [13] => ILW [WST_DataTablePrefix] => IWD [14] => IWD [WST_QtyExpression] => [15] => ) 
Array ( [WST_PK] => 10 [0] => 10 [WST_Name] => Price & Cost Change [1] => Price & Cost Change [WST_Form] => frmPriceCostChangeWorksheet [2] => frmPriceCostChangeWorksheet [WST_Table] => v_PromotionalSaleWorksheet [3] => v_PromotionalSaleWorksheet [WST_TablePKfield] => PSW_PK [4] => PSW_PK [WST_TableCPKfield] => PSW_CPK [5] => PSW_CPK [WST_WorksheetFKfield] => PSW_WRK_FK [6] => PSW_WRK_FK [WST_WorksheetCFKfield] => PSW_WRK_CFK [7] => PSW_WRK_CFK [WST_CAT_FK] => 15 [8] => 15 [WST_CAT_CFK] => 0 [9] => 0 [WST_DBTable] => PromotionalSaleWorksheet [10] => PromotionalSaleWorksheet [WST_DataTable] => v_PromotionalSaleWorksheetData [11] => v_PromotionalSaleWorksheetData [WST_DBDataTable] => PromotionalSaleWorksheetData [12] => PromotionalSaleWorksheetData [WST_WSTablePrefix] => PSW [13] => PSW [WST_DataTablePrefix] => PSD [14] => PSD [WST_QtyExpression] => [15] => ) 
Array ( [WST_PK] => 11 [0] => 11 [WST_Name] => GL-Store [1] => GL-Store [WST_Form] => frmGLWorksheet [2] => frmGLWorksheet [WST_Table] => v_GeneralLedgerWorksheet [3] => v_GeneralLedgerWorksheet [WST_TablePKfield] => GLW_PK [4] => GLW_PK [WST_TableCPKfield] => GLW_CPK [5] => GLW_CPK [WST_WorksheetFKfield] => GLW_WRK_FK [6] => GLW_WRK_FK [WST_WorksheetCFKfield] => GLW_WRK_CFK [7] => GLW_WRK_CFK [WST_CAT_FK] => 20 [8] => 20 [WST_CAT_CFK] => 0 [9] => 0 [WST_DBTable] => GeneralLedgerWorksheet [10] => GeneralLedgerWorksheet [WST_DataTable] => v_GeneralLedgerData [11] => v_GeneralLedgerData [WST_DBDataTable] => GeneralLedgerData [12] => GeneralLedgerData [WST_WSTablePrefix] => GLW [13] => GLW [WST_DataTablePrefix] => GLD [14] => GLD [WST_QtyExpression] => [15] => ) 
*/
	
	//$stmt = $conn->prepare("SELECT * FROM WorksheetTypes");
	
/*--------------------------------------------------------------------------------------------------
v_InventoryMaster:

FOUND FIRST ITEM FROM INVENTORY MASTER:

Array ( [inv_pk] => 42916 [0] => 42916 [inv_cpk] => 1000 [1] => 1000 [inv_type] => Stock Inventory [2] => Stock Inventory [inv_scancode] => 722252601506 [3] => 722252601506 [inv_name] => Chocolate Hazelnut Bar [4] => Chocolate Hazelnut Bar [inv_size] => 2.4 oz [5] => 2.4 oz [inv_receiptalias] => CLIF/B-BAR CHOCOLATE HZLNT 2.4OZ [6] => CLIF/B-BAR CHOCOLATE HZLNT 2.4OZ [inv_suggestedretail] => 0.0000 [7] => 0.0000 [inv_compulsoryqtyentry] => 0 [8] => 0 [inv_forcecustomertracking] => 0 [9] => 0 [inv_memo] => [10] => [inv_default] => 0 [11] => 0 [pos_timestamp] => 2016-11-04 11:42:23.634143 [12] => 2016-11-04 11:42:23.634143 [inv_wgt_fk] => [13] => [inv_wgt_cfk] => [14] => [inv_dpt_fk] => 6 [15] => 6 [inv_dpt_cfk] => 1000 [16] => 1000 [inv_brd_fk] => 4253 [17] => 4253 [inv_brd_cfk] => 1000 [18] => 1000 [inv_pi1_fk] => 281 [19] => 281 [inv_pi1_cfk] => 1000 [20] => 1000 [inv_pi2_fk] => 243 [21] => 243 [inv_pi2_cfk] => 1000 [22] => 1000 [inv_pi3_fk] => [23] => [inv_pi3_cfk] => [24] => [inv_pi4_fk] => [25] => [inv_pi4_cfk] => [26] => [inv_discontinued] => 0 [27] => 0 [pi1_description] => Energy Bars/Gels [28] => Energy Bars/Gels [pi2_description] => Lifestyle/Wellness Bars [29] => Lifestyle/Wellness Bars [pi3_description] => [30] => [pi4_description] => [31] => [inv_powerfield1] => [32] => [inv_powerfield2] => [33] => [inv_powerfield3] => [34] => [inv_powerfield4] => 110416RebAtv [35] => 110416RebAtv [inv_location] => 3B7 [36] => 3B7 [inv_lastcost] => 1.2958 [37] => 1.2958 [inv_averagecost] => 1.2958 [38] => 1.2958 [inv_onhand] => -11.000 [39] => -11.000 [inv_onorder] => 0.000 [40] => 0.000 [inv_intransit] => 0.000 [41] => 0.000 [inv_reorderpoint] => 0.000 [42] => 0.000 [inv_reorderqty] => 0.000 [43] => 0.000 [inv_reorderconstantlevel] => 0 [44] => 0 [inv_sto_fk] => 1 [45] => 1 [inv_sto_cfk] => 1000 [46] => 1000 [inv_reorderconstantqty] => 0.000 [47] => 0.000 [inv_autoreordermethod] => 0 [48] => 0 [inv_weight_shd_fk] => [49] => [inv_weight_shd_cfk] => [50] => [inv_replace_shd_fk] => [51] => [inv_replace_shd_cfk] => [52] => [inv_orderdaysofstock] => 0 [53] => 0 [inv_adjforzerostockdays] => 0 [54] => 0 [inv_usewtdavg] => 0 [55] => 0 [inv_leaddays] => 0 [56] => 0 [inv_safetystockqty] => 0.000 [57] => 0.000 [inv_calcleaddays] => 0 [58] => 0 [inv_calcsafetystock] => 0 [59] => 0 [inv_zfp_fk] => [60] => [inv_zfp_cfk] => [61] => [sil_ven_fk_default] => 3 [62] => 3 [sil_ven_cfk_default] => 1000 [63] => 1000 [sil_dsditem] => 0 [64] => 0 [INV_FML_FK] => [65] => [INV_FML_CFK] => [66] => [inv_minimumrequest] => 0.000 [67] => 0.000 [sto_number] => BP [68] => BP [sto_name] => BriarPatch Co-op [69] => BriarPatch Co-op [sto_zon_fk] => 1 [70] => 1 [sto_zon_cfk] => 0 [71] => 0 [zon_name] => Primary Zone [72] => Primary Zone [brd_name] => Clif Bars - Builder [73] => Clif Bars - Builder [dpt_name] => Grocery 04 [74] => Grocery 04 [dpt_number] => 4 [75] => 4 [wgt_name] => [76] => [ord_ven_fk] => 3 [77] => 3 [ord_ven_cfk] => 1000 [78] => 1000 [ord_asc_fk] => [79] => [ord_asc_cfk] => [80] => [ord_quantityinorderunit] => 12.000 [81] => 12.000 [ord_supplierstocknumber] => 74707 [82] => 74707 [oup_name] => Case [83] => Case [ven_companyname] => *United Natural Foods INC [84] => *United Natural Foods INC [ven_code] => UNFI [85] => UNFI [asc_scancode] => [86] => [asc_receiptalias] => [87] => [asc_quantity] => [88] => [sib_baseprice] => 2.1900 [89] => 2.1900 [sib_idealmargin] => 43.0000 [90] => 43.0000 [sib_dis_fk] => [91] => [sib_dis_cfk] => [92] => [sil_lastreceived] => 2016-12-03 12:06:38.145049 [93] => 2016-12-03 12:06:38.145049 [sil_lastsold] => 2016-12-10 15:56:26.185000 [94] => 2016-12-10 15:56:26.185000 [inv_lastreceived] => 2016-12-03 12:06:38.145049 [95] => 2016-12-03 12:06:38.145049 [inv_lastsold] => 2016-12-10 15:56:26.185000 [96] => 2016-12-10 15:56:26.185000 [sib_promptforprice] => 0 [97] => 0 [inv_displaysaleshistoryonpo] => 1 [98] => 1 [inv_datecreated] => 2015-02-25 [99] => 2015-02-25 [inv_emp_fk_createdby] => 152 [100] => 152 [inv_emp_cfk_createdby] => 1000 [101] => 1000 [sil_irp_fk] => [102] => [sil_irp_cfk] => [103] => [sil_local] => 0 [104] => 0 [inv_cool] => [105] => [inv_pdm_fk] => [106] => [inv_pdm_cfk] => [107] => [pdm_name] => [108] => [inv_rdp_fk] => [109] => [inv_rdp_cfk] => [110] => [rdp_description] => [111] => [del_ingredientList] => [112] => [deliToUse] => [113] => ) 

*/
	
	//$stmt = $conn->prepare("SELECT * FROM v_InventoryMaster WHERE inv_pk = 42916");
	
		
/*OTHER:
Finding how many entries there are in a table:
//$stmt = $conn->prepare("SELECT count(*) FROM InventoryLabelWorksheets");

*/

	//$stmt = $conn->prepare("SELECT count(*) FROM v_InventoryMaster WHERE inv_name IS LIKE Hazelut");

	
	//[BD]---Execute SQL Statement || 
	$stmt->execute();
		while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
		  print_r($row);
		  	echo "<br />";
		}
		
	echo "<br />Connected Successfully";
?>
