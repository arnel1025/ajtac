<?php
//login
function enter($user)
	{
	$_SESSION['uname'] = $user['uname'];
	$_SESSION['pword'] = $user['pword'];
	return TRUE;
	}

//logout

function test_login()
	{
	return isset($_SESSION['uname']);
	}

function require_login()
	{
      if(!test_login())
	 	{
		redirect_to(url_for('main-index.php'));
     	}
	}

//define path
function url_for($script_path)
	{
	//add the leading '/' if not present
	if($script_path[0] != '/')
		{
		$script_path = "/".$script_path;
		}
	return WW_ROOT.$script_path;
	}
//handle reserved and special charactes

function u($string="")
{
	return urlencode($string);
}

function raw_u($string="")
{
	return rawurlencode($string);
}

function h($string="")
{
	return htmlspecialchars($string);
}

//header functions and page redirect
function error_404()
{
	header($_SERVER["SERVER_PROTOCOL"]."404 Not Found");
	exit();
}

function error_500()
{
	header($_SERVER["SERVER_PROTOCOL"]."500 Internal Server Error");
	exit();
}

function redirect_to($location)
{
	header("location: ". $location);
	exit;
}

//server Functions
function is_post_request()
{
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// validation and error
function show_errors($error=array())
{
$display = '';
If(!empty($error))
	{
	$display .= "<div class=\"error\">";
	$display .= "Following errors were found;";
	$display .= "<ul>";
	// variable arguement passed in $error. New variable for loop is $error_list
	foreach($error as $error_list)
		{
		$display .= "<li>" . h($error_list) . "</li>";
		}
	$display .= " </ul> </div> ";
	}
return  $display;
}

?>
