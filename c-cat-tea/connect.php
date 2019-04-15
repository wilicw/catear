<?php 
	$db_host = "182.50.133.91:3306";
	$db_username = "tea_3_4_2018";
	$db_password = "dacsc_cnmc_crc_2018";
	$db_name="tea_2018_test";
	$conn = mysqli_connect($db_host, $db_username, $db_password,$db_name);
	mysqli_query($conn,"SET NAMES 'utf8'");
	date_default_timezone_set('ASIA/TAIPEI');
?>