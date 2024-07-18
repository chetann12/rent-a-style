<?php 
 
 include('localdb.php');
// include('webdb.php');

if(isset($_POST['check_dress'])){

  $dressid=$_GET['dress_id'];
  $sdate=$_POST['sdate'];
  $check= "select * from `order` where `dress_id`=$dressid and `start_date`=$sdate";
  $query=mysqli_query($con,$check);
  $row_count=mysqli_num_rows($query);

  if($row_count>0){
    
  }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Womens Section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>

<!-- Navbar first -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Rent A Style</a>
           
         
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a> 
                <!-- change up -->
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="signup.php">Sign Up</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="sign.php">Login</a>
              </li>
               
               
            </ul>
            <form class="d-flex" action="womensdress.php" method="get">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
              <!-- <button class="btn btn-outline-success" type="submit" name="search_dress"></button> -->
              <input type="submit" class="btn btn-outline-success" name="search_dress" value="Search" >
            </form>
          </div>
         <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Dress is already booked on selected date</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div> -->
      </nav>

      <!-- cards -->
      <h1 style="text-align:center;">Women`s Section</h1>
      <form method="post">
      <div class="container">
       <div class="row">
        <?php
        
        // displaying records
       if(isset($_GET['dressid']))
       {
        $get_dress_id=$_GET['dressid'];
        $display="Select * from `dress` where `dress_id`=$get_dress_id";
        // $display="Select * from `dress` order by rand()";
        $result=mysqli_query($con,$display);
        while($row=mysqli_fetch_assoc($result))
        {
          $name=$row['name'];
          $available_size=$row['size'];
          $price=$row['price'];
          $qty=$row['quantity'];
          $occas=$row['occasions'];
          $desc=$row['description'];
          $image1=$row['image1'];
          $image2=$row['image2'];
          $image3=$row['image3'];
          $dressid=$row['dress_id'];

          
          
          echo "<div class='col-sm-4'>
          
          <div class='card'style='width: 18rem;'>
        <img src='dress_image/$image1' class='card-img-top img-thumbnail' alt='...'>
        <div class='card-body'>
        
        <h5 class='card-title'>$name</h5><p>Price <span id='price_change'>$price
        </span>
        <br>
        $desc 
        ";
        
        echo "</br> Select Size :";
        echo "<select name='sizedrop' id='sizedrop' class='form-select' style='width: 50%;'>";
        $arr=explode(' ',$available_size);
        foreach($arr as $x=> $val){
        

        echo "<option>$val</option>";

        }
        
        echo "</select>

        </p>
         
        <a href='#' class='btn btn-primary'>Add to cart</a>
        
        </div>
        </div>
        <!-- col end -->
          </div>";
          
        
    }
  }
      ?>
         <!-- <a href='view_more.php?dressid=$dressid' class='btn btn-primary'>View</a> -->
        <!-- row end -->
 
 
          
          <div class="col-8">
<div class="row mb-3">
  <div class="col mt-2">
  <label class="form-label">Rental Duration &nbsp;</label>
  <select class="form-select" style="width: 20%;" id="rent_duration"
   onchange="rent_duration_fun(); change_date()">
  
  <option value="2">Two Days</option>
  <option value="3">Three Days</option>
  <option value="4">Four Days</option>
  <option value="5">Five Days</option>
  <option value="6">Six Days</option>
 

</select>
</div>
</div>

 <div class="row">
  <div class="col">
  <label class="form-label">Start date : </label> <input class="form-control w-auto"
   type="date" name="sdate" id="sdate" onchange="change_date()">
  
   <label class="form-label mt-2">End date : </label> <input
   class="form-control w-auto" type="date" name="edate" id="edate" readonly>
  </div>
 </div>

          </div>
         

 </div>
 </div> 
      </form>
  
 <!-- <hr>
 <p id="demo1">Hii</p> -->
 
<script type="text/javascript">

  $(document).ready(function(){

    var date_obj=new Date();
    var month= date_obj.getMonth() + 1;
    var tdate=date_obj.getDate();
    var year=date_obj.getFullYear();

    if(month<10){
      month= '0'+ month.toString();
    }
    if(tdate<10){
      tdate='0' + tdate.toString();
    }

    var maxdate= year + '-' + month + '-' + tdate;
    $('#sdate').attr('min',maxdate);
    $('#edate').attr('min',maxdate);


  });

  function change_date(){

  var days=document.getElementById("rent_duration").value;
  days=days-1;
  
  var add_date=new Date(document.getElementById("sdate").value);
  add_date.setDate(add_date.getDate() + parseInt(days));
  document.getElementById("edate").valueAsDate=add_date;
  
  }

function rent_duration_fun(){
var a=document.getElementById("rent_duration").value;
var php_price= <?php echo $price; ?>;
var price;
if(a=="2"){
price= php_price;
}
else if(a=="3"){
  var inc=(php_price*20)/100;
  price=php_price+inc; 
}
else if(a=="4"){
  var inc=(php_price*30)/100;
  price=php_price+inc;
}
else if(a=="5"){
  var inc=(php_price*40)/100;
  price=php_price+inc;
}
else{
  var inc=(php_price*50)/100;
  price=php_price+inc;
}
document.getElementById("price_change").innerHTML=price;
if(a==0){
  change_date();
}
}
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

  </body>
</html>