<?php

$DATABASE_HOST = 'db5000259912.hosting-data.io';
$DATABASE_USER = 'dbu211597';
$DATABASE_PASS = 'Sone#1127';
$DATABASE_NAME = 'dbs253594';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>