<?php

$host = 'localhost';
$utilizator = 'root';       
$parola = '';
$numebd = 'database';

$link=@mysqli_connect($host, $utilizator, $parola, $numebd);
if(!$link)
{
	die("Error to connect".mysqli_connect_error());
}

?>