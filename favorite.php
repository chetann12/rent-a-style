<?php
include('localdb.php');
session_start();


if(!isset($_SESSION['user_id1'])){
 $fav_login=true;
 header('location: sign.php');

}

// bank check
$update_true=false;
if(isset($_SESSION['user_id1'])){

  $userid=$_SESSION['user_id1'];
$check_details="SELECT * FROM `bank_details` WHERE `user_id`='$userid' ";
$result_check_details=mysqli_query($con,$check_details);
$num_rows=mysqli_num_rows($result_check_details);

if($num_rows>0){
   
  $update_true=true;
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
    <title>My Favorites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-lg-2 px-lg-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Rent A Style</a>
           
           
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="index.php">Home</a> <!--index.php -->
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="signup.php">Sign Up</a>
              </li>
              
              <?php
               echo '<li class="nav-item">
                <a class="nav-link active" href="logout.php">Logout</a>
              </li>';

              if($update_true=="true"){
                echo '<li class="nav-item">
                <a class="nav-link active" href="edit_bank_details.php">Edit Bank Details</a>
              </li>';
            }
              
              else{
              echo '<li class="nav-item">
                <a class="nav-link active" href="bank_details.php">Add Bank Details</a>
              </li>';
              }
            

              

              // welcome
              
                //   echo '<li class="nav-item">
                //   <a class="nav-link active" href="#">Welcome '.$_SESSION['user_id1'].'</a>
                // </li>';
                 
               
               ?>
            </ul>
                 </div>
    </nav>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous">  </script>
</body>
</html>