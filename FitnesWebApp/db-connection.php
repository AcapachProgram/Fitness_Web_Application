<?php
	
	$dbhost = "localhost";
	$dbuser ="root";
	$dbpass = "";
	$db_name ="fitnesswebapp";

    $con = new mysqli($dbhost, $dbuser, $dbpass, $db_name);
	
			if($con->connect_errno )
			{
				die('could not connect: ' . $con->connect_errno);
			}
	
?>
