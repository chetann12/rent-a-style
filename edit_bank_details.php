<?php
include('localdb.php');
// include('webdb.php');
$insert=false;
session_start();

$userid=$_SESSION['user_id1'];
$check_details="SELECT * FROM `bank_details` WHERE `user_id`='$userid' ";
$result_check_details=mysqli_query($con,$check_details);
$rows=mysqli_fetch_array($result_check_details);

$accno=$rows['account_no'];
$bank=$rows['bank_name'];
$ifsc_code=$rows['ifsc_code'];
$branch=$rows['branch'];

if(isset($_POST['bsubmit']))
{

global $con;

$accno=$_POST['accno'];
$bank=$_POST['bankname'];
$ifsc=$_POST['ifsccode'];
$branchname=$_POST['branch'];

$update_query="UPDATE `bank_details` SET `account_no`=$accno,`bank_name`='$bank',`ifsc_code`='$ifsc', `branch`='$branchname'
WHERE `user_id`='$userid' ";
$result=mysqli_query($con,$update_query);

if($result){
    $insert="true";
}
else{
    echo "error because of ".mysqli_error($con);
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bank details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
   
</head>
<body>
   

<?php 

if($insert=="true"){

    $_SESSION['updatedbank']="true";   
// header('location:homepage.php');s
header('location:index.php');
}

?>
 
<h3 class="text-center mt-3">Edit Bank Details</h3>
<div class="row justify-content-center">
<div class="col-lg-12 col-xl-6">
<form method="POST">


<div class="mb-2">
<label for="accno" class="form-label">Account Number</label>
<input type="text" name="accno" id="accno" class="form-control"
 required pattern="[1-9]{1}[0-9]{1,18}" maxlength="18" minlength="8" 
 value="<?php echo $accno ; ?>" >
</div>
 


<div class="mb-2">
    <label for="bank name" class="form-label">Bank Name</label>
    <input type="text" name="bankname" id="bname" class="form-control" value="<?php echo $bank; ?>"
    title="Enter bank name in capital letters" required pattern="[A-Z]{3,30}" maxlength="30">
</div>
 


    <div class="col mb-2">
    <label class="form-label" for="ifsccode">IFSC code</label>
<input type="text" name="ifsccode" id="ifsc" class="form-control" value="<?php echo $ifsc_code; ?>"
pattern="[A-Z]{4}[0-9]{7}" required maxlength="11">
    </div>
 


    <div class="col mb-2">
    <label class="form-label" for="branch">Branch Name</label>
<input type="text" name="branch" id="branch" class="form-control" value="<?php echo $branch; ?>"
required pattern="([\w ]+)">
    </div>
 

<div>
<input type="submit" value="Submit" class="btn btn-success" name="bsubmit">
<input type="reset" value="Reset" class="btn btn-dark">
</div>
</form>
</div>
</div>
 




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
     crossorigin="anonymous">  </script>
</body>
</html>