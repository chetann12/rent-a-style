<?php
include('localdb.php');
// include('webdb.php');
include('common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>

<!-- Navbar first -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Rent A Style</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a> <!-- homepage -->
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="signup.php">Sign Up</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="sign.php">Login</a>
              </li>
               
               
            </ul>
            <form class="d-flex" role="search" action="" method="get">
              <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
              <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
           <input type="submit" class="btn btn-outline-success" name="search_dress" value="Search">
            </form>
          </div>
        </div>
      </nav>

      <!-- cards -->
      <h1 style="text-align:center;">Womens Section</h1>
      <div class="row">
        <?php 
        // displaying records
        if(isset($_GET['search_dress'])){
          search_dressf();
          }
          else{
        $display="Select * from `dress` where `gender`='F' ";
        // $display="Select * from `dress` order by rand()";
        $result=mysqli_query($con,$display);
        while($row=mysqli_fetch_assoc($result))
        {
          $name=$row['name'];
          $size=$row['size'];
          $price=$row['price'];
          $qty=$row['quantity'];
          $occas=$row['occasions'];
          $desc=$row['description'];
          $image1=$row['image1'];
          $image2=$row['image2'];
          $image3=$row['image3'];
          $dressid=$row['dress_id'];
          echo "<div class='col mb-2'>
          
          <div class='card' style='width: 18rem;'>
    <img src='dress_image/$image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$name</h5>
      <p class='card-text'>$desc</p>
      <a href='#' class='btn btn-primary'>Add to cart</a>
      <a href='view_womens.php?dressid=$dressid' class='btn btn-primary'>View</a>
    </div>
  </div>
  <!-- col end -->
          </div>";
          
        }
        }
        ?>
         
        <!-- row end -->
</div>

       
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
  </body>
</html>