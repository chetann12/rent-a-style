<?php 
$servername="localhost";
$username="root";
$password="";
$database="ras";

$con=mysqli_connect($servername,$username,$password,$database);
if(!$con){

    die("Connecton failed due to ".mysqli_connect_error());

}
 
?>