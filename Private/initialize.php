<?php
//output buffering
ob_start();
session_start();

/*
Notes
= Super Globals
	- should be on top of page
	- always return a string value when assigned to local variables
*/

//file path
define ("Private_Path", dirname(__FILE__));
define ("Project_Path", dirname(Private_Path));
define ("Public_Path", Project_Path.'/Pub;ic' );
define ("Shared_Path", Private_Path.'/Shared' );
define ("Engineering_Path", Public_Path.'/engineering' );

//url path Defines the Root of the Public Side of the website
$public_end = strpos($_SERVER['SCRIPT_NAME'],'/Public')+7; //returns a number
$doc_root = substr($_SERVER['SCRIPT_NAME'],0,$public_end); //returns a string
define("WW_ROOT",$doc_root );

require_once ('functions.php');
require_once ('database.php');
require_once ('query.php');
require_once ('validate.php');

$PD = db_connect();
$error = [];

?>
