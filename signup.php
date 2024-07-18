<?php
//include 'homepage.php';
include 'localdb.php';
// include 'webdb.php';
$insert=false;

if(isset($_POST['Register']))
{
 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uid=$_POST['uid'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];



$sqle="select * from `user` where `email_id`='$email'"; 
$resulte=mysqli_query($con,$sqle);
$row_counte=mysqli_num_rows($resulte);

$sqlu="select * from `user` where `user_id`='$uid'";
$resultu=mysqli_query($con,$sqlu);
$row_countu=mysqli_num_rows($resultu);

$sqlp="select * from `user` where `phone`=$phone";
$resultp=mysqli_query($con,$sqlp);
$row_countp=mysqli_num_rows($resultp);


if($row_counte>0)
{
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Email-id already exist</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}else if($row_countu>0){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>user_id already exists.</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}else if($row_countp>0){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Phone number already exist</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}else if($pass!=$cpass){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Password not matching</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}else if($fname==$uid){
 echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
 <strong>Name and user_id cannot be same</strong>
 <button class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
else{


  $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
$sql= "INSERT INTO `user` (`fname`, `lname`,`user_id`, `email_id`, `phone`, `password`) VALUES
 ('$fname','$lname', '$uid','$email', '$phone', '$hash_pass')";

$result=mysqli_query($con,$sql);
$insert=true;
 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  
<?php
session_start();

 if($insert)
 {
  $_SESSION['insert']="true";
header('location:sign.php');
 }
 
 ?>
<div class="conatiner-fluid my-3"> 
  <h2 class="text-center">Create an account</h2>
  <div class="row justify-content-center">
   
    
    <div class="col-lg-12 col-xl-6">
      <form method="post">
        <div class="row">

         <!-- first name -->
          <div class="col">
        <div class="mb-2" >
          <label for="fname" class="form-label">First Name</label>
          <input type="text" id="fname" name="fname" pattern="[a-zA-Z]{3,50}"
           placeholder="Enter Your First Name" autocomplete="off" maxlength="50"
           required class="form-control"  title="Only characters are allowed">
        </div>
        </div>
        <!-- last name -->
        <div class="col">
        <div class="mb-2">
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" id="lname" name="lname" pattern="[a-zA-Z]{3,50}" maxlength="50"
            title="Only characters are allowed"
           placeholder="Enter Your Last Name" autocomplete="off" required class="form-control">
        </div>
        </div>
        </div>

        <!-- user_id -->
        <div class="mb-2">
          <label for="uid" class="form-label">User Id</label>
          <input type="text" id="uid" name="uid" maxlength="8" pattern="[a-z0-9]{6,8}"
          title="user_id must contain lowercase and numbers between 6 to 8 characters"
           placeholder="Enter user_id" autocomplete="off" required class="form-control" 
          >
        </div>

        <!-- email -->
        <div class="mb-2">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" id="email" name="email"
           placeholder="Enter Your E-mail" autocomplete="off" required class="form-control">
        </div>

        <!-- phone -->
        <div class="mb-2">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" id="phone" name="phone" maxlength="10" pattern="[6-9]{1}[0-9]{9}" 
           placeholder="Enter Your Mobile Number" autocomplete="off" title="Incorrect phone number"
            required class="form-control">
        </div>

        <!-- password -->
        <div class="mb-2">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" pattern=".{8,}" 
          title="Password must be 8 or more characters"
           placeholder="Enter Your Password" autocomplete="off" maxlength="15" required class="form-control">
        </div>

        <!-- confirm password -->
        <div class="mb-2">
          <label for="cpassword" class="form-label">Confirm Password</label>
          <input type="password" id="cpassword" name="cpassword" 
           placeholder="Confirm Password" autocomplete="off" required class="form-control">
        </div>

        <div class="">
          <input type="submit" class="btn btn-success" value="Sign Up" name="Register">
        </div>
        <p class="small fw-semibold">Already have an account?
           <a href="sign.php" class="btn btn-outline-dark text-decoration-none btn-sm">
            Sign In</a></p>
      </form>
    </div>
  </div>
</div>
  

 

  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</body>
</html>