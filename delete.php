<?php
// include 'localdb.php';
include 'webdb.php';
if(isset($_GET['deleteid']))
{
$id=$_GET['deleteid'];
$sql="DELETE FROM `dress` WHERE `dress_id` = $id";
$result=mysqli_query($con,$sql);
if($result)
{
header('location:dressm.php'); //admin php

}
else{
    die(mysqli_error($con));
}
}
?>