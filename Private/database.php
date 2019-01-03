<?php
require_once('credentials.php');

function db_connect()
	{
	$PD = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if (!$PD)
		{
		//error handling
		echo "Error: Unable to connect to MySQL.". PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
		}
		elseif ($PD)
		{
		//successful connection
		//echo "Success: A proper connection to MySQL was made! ". PHP_EOL;
		//echo "Host information: " . mysqli_get_host_info($PD). PHP_EOL;
		}
	return $PD;
	}

function db_disconnect($PD)
	{
	if(isset($PD))
		{
		mysqli_close($PD);
		}
	}

//security
function de($PD, $sql)
	{
		return mysqli_real_escape_string($PD, $sql);
	}


//error handling
function test_connection()
	{
	if (mysqli_connect_errno())
		$msg = "Connection Failed" . mysqli_connect_error . "(". mysqli_connect_errno .")";
		exit($msg);
	}

function test_query($query_set)
	{
		if(!$query_set)
		{
		exit("No records found");
		}
	}
?>
