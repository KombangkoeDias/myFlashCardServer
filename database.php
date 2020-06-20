<?php
session_start();
$username="root";//change username 
$password="root"; //change password
$host="localhost";
$db_name="people"; //change databasename

$connect=mysqli_connect($host,$username,$password,$db_name);

if(!$connect)
{
	echo json_encode("Connection Failed");
}

?>