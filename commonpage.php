<?php
include('localdb.php');
include('common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="signup.php">Sign Up</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="\Project TY\logout.php">Logout</a>
              </li>
               
               
            </ul>
            <form class="d-flex" action="commonpage.php" method="get">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
              <!-- <button class="btn btn-outline-success" type="submit" name="search_dress"></button> -->
              <input type="submit" class="btn btn-outline-success" name="search_dress" value="Search" >
            </form>
          </div>
        </div>
      </nav>

      <!-- cards -->
      <h1 style="text-align:center;">Men's Section</h1>
      <div class="row">
        <?php 
        // displaying records

       
        search_dress();
        ?>
         
        <!-- row end -->
</div>

       
   


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>