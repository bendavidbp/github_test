<?php
	$link = sybase_connect('SYBASE', '', '')
			or die("Could not connect !");
	echo "Connected successfully";
	sybase_close($link);
?>