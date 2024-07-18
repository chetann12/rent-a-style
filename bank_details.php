  <?php
  
  include ('localdb.php');
  // include('webdb.php');
  $add_detail=false;
session_start();
// $userid=$_SESSION['user_id1'];
$arr;
if(isset($_POST['ifsccode1'])){

  $ifsc=$_POST['ifsccode'];
  $get_data=@file_get_contents("https://ifsc.razorpay.com/".$ifsc);
  $arr=json_decode($get_data);
  if(isset($arr->BRANCH)) {
    echo '<pre>';
    echo "<b>Bank:-</b>".$arr->BANK;
  }

}

if(isset($_POST['banksubmit'])){

   
    $accno=$_POST['accno'];
    $bankname=$_POST['bname'];
    $ifsc=$_POST['ifsccode'];
    $branch=$_POST['branch'];

   

    

    $adddetail="INSERT INTO `bank_details` (`user_id`,`account_no`,`bank_name`,`ifsc_code`,`branch`)
     VALUES
     ('$userid','$accno',' $bankname','$ifsc','$branch')";
     $add_query=mysqli_query($con,$adddetail);

     if($add_query){
      $add_detail=true;
     }
    

}
  
  
  ?>
  
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
  </head>

  <body>
  <?php
  
  if($add_detail)
  {

    $_SESSION['addbank']="true";
    // header('location:homepage.php');
    header('location:index.php');
    
  }
?>


 
 


 <div class="conatiner-fluid">
<h3 class="text-center mt-3">Add Bank Details</h3>
<div class="row justify-content-center">
<div class="col-lg-12 col-xl-6">
<form method="post">


<div class="mb-2">
<label for="accno" class="form-label">Account Number</label>
<input type="text" name="accno" id="accno" class="form-control"
 required pattern="[1-9]{1}[0-9]{1,18}" maxlength="18" minlength="8" 
    >
</div>
 


<div class="mb-2">
    <label for="bank name" class="form-label">Bank Name</label>
    <input type="text" name="bname" id="bname" class="form-control" 
    title="Enter bank name in capital letters" required pattern="[A-Z]{3,30}" maxlength="30" 
    value="">
</div>
 


    <div class="col mb-2">
    <label class="form-label" for="ifsccode">IFSC code</label>
<input type="text" name="ifsccode" id="ifsc" class="form-control" 
pattern="[A-Z]{4}[0-9]{7}" required maxlength="11">
    </div>
 


    <div class="col mb-2">
    <label class="form-label" for="branch">Branch Name</label>
<input type="text" name="branch" id="branch" class="form-control" 
required pattern="([\w ]+)">
    </div>
 

<div>
<input type="submit" value="Submit" class="btn btn-success" name="banksubmit">
</div>
<div>
  <input type="submit" value="ifsc" name="ifsccode1" class="btn btn-dark">
</div>
</form>
</div>
</div>
 </div>
 



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
  </body>
  </html>