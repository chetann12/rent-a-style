<?php 
include('localdb.php');
// include('webdb.php');
session_start();



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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent A Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="\Project TY\style.css"> 
  </head>
  <body>
    
<?php 

if(isset($_SESSION['updatebank'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alret'>
    <strong>Updated Bank details successfully</strong>
    <button class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>"; 
 }

 if(isset($_SESSION['addbank'])){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alret'>
    <strong>Your bank details are saved successfully</strong>
    <button class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>"; 
 }

?>
    
  <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top py-lg-2 px-lg-3">
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
            
              if(!isset($_SESSION['user_id1'])){
                
              echo '<li class="nav-item">
                <a class="nav-link active" href="sign.php">login</a>
              </li>';

               
              }
              else{

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
            

              }

              // welcome
              if(!isset($_SESSION['user_id1'])){
                
                echo '<li class="nav-item">
                  <a class="nav-link active" href="#">Welcome Guest</a>
                </li>';
  
                 
                }else{
  
                  echo '<li class="nav-item">
                  <a class="nav-link active" href="#">Welcome '.$_SESSION['user_id1'].'</a>
                </li>';
                }
               
               ?>
            </ul>
                 </div>
      </nav>

       
      <!-- navbar second -->
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="homepage.php">Welcome Guest</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="login.php">Login</a>
              </li>    
            </ul>           
          </div> 
      </nav> -->

      <!-- carousel -->
      
      <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item" data-bs-interval="3000">
            <img style="height: 90vh;" id="fimage" src="homepageimage\mendress2.jpg" class="d-block w-100 image" alt="..." >
            <div class="carousel-caption text-center d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>

          <div class="carousel-item active" data-bs-interval="3000">
            <img id="fimage" src="homepageimage\dollar6.jpg" class="d-block w-100 image" alt="..." >
            <div class="carousel-caption d-none d-md-block text-center">
              <h1>Welcome to Rent A Style</h1>
              <h3>Style Your Own Fashion</h3>

               <h3>Look Yourself Good In Various Traditional Dress</h3> -->
              <!-- <button class="btn btn-outline-light">Rent Women's wear</button>
            </div>
          </div>

           

           
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> -->

      <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
  </div>
  
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
      <img src="homepageimage\mendress2.jpg" class="d-block w-100" alt="..." title="">
      <div class="carousel-caption d-none d-md-block">
      <h1>Welcome to Rent A Style</h1>
        <h4>Style Your Own Fashion</h4>
        <button class="btn btn-light"><a href="womensdress.php" style="text-decoration:none; color:black">Rent Women's wear</a></button>
        
        <button class="btn btn-light"><a href="mensdress.php" style="text-decoration:none; color:black">
        Rent Men's wear</a></button>
         
      </div>
    </div>
   
    <div class="carousel-item" data-bs-interval="3000">
      <img src="homepageimage\dollar7.jpg" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">
      <h1>Welcome to Rent A Style</h1>
        <h4>Style Your Own Fashion</h4>
        <button class="btn btn-light"><a href="womensdress.php" style="text-decoration:none; color:black">Rent Women's wear</a></button>
        
        <button class="btn btn-light"><a href="mensdress.php" style="text-decoration:none; color:black">
        Rent Men's wear</a></button>
       
      </div>
    </div>

     
    <!-- <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<cite>
 image referred from https://www.tasva.com/collections/sherwanis</cite>


      
      <footer class="container-fluid" style="background-color: bisque;">
        <p style="text-align: center;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> Copyright privacy Terms and Conditions</p>
      </footer>
      
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
     crossorigin="anonymous">  </script>
 
 </body>
</html>
