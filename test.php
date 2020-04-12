<?php
	
	echo "Hello world";

$mysqli = new mysqli('localhost','MULLAT02','12011992','mullat02mysql2');

if($mysqli->connect_error){
	echo $mysqli->connect_error;
}
else
{
	echo "success";
}





?>