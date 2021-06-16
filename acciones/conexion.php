<?php

$server="localhost";
$db="did";
$user="admin";
$pass="ninguna";

$mysqli=new mysqli ($server, $user, $pass, $db);

if($mysqli->connect_errno){
	echo "Fallo al conectar la DB:(". $mysqli->connect_errno .")".$mysqli->connect_error;
}

?>
