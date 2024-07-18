<?php
$server="sql105.epizy.com";
$username="epiz_33139122";
$password="07I8jp8OR1";
$database="epiz_33139122_ras";

$con=mysqli_connect($server,$username,$password,$database);

if(!$con)
{
die("Connection failed due to ".mysqli_connect_error());

}


?>