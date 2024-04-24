<?php
$db_host="10.180.50.214:3306"; //10.180.50.214:3306 server 
$db_user="root_user";	//database username
$db_password="Fanaag@2024#";	//database password 
$db_name = "fanaagaf_db"; 
try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



