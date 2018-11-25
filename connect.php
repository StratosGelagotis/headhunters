<?php 
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = '';
	$db_name = 'headhunters';
	
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$db_name);
	
	if(!$conn)
	{
		die("Connection failed: " .mysqli_connect_error());
	}	
	else
		echo "connected \n";
		echo "<br/>\n";
	?>