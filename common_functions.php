<?php
include 'localdb.php';
// include 'webdb.php';

//get searched product
function search_dress()
{
    global $con;
if(isset($_GET['search_dress']))
{
    
    $search_data=$_GET['search_data'];
    $search="Select * from `dress` where `keywords` like '%$search_data%' AND `gender`='M' ";
  

    $result=mysqli_query($con,$search);
    $rows=mysqli_num_rows($result);
    if($rows==0)
    {
        echo "<h2 style='text-align:center;color:rgb(217, 56, 56)'>Sorry! no result found.</h2>"; 
        
    }
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
          echo "<div class='col mb-2'>
          
          <div class='card' style='width: 18rem;'>
    <img src='dress_image/$image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$name</h5>
      <p class='card-text'>$desc</p>
      <a href='#' class='btn btn-primary'>Add to cart</a>
      <a href='#' class='btn btn-primary'>View</a>
    </div>
  </div>
  <!-- col end -->
          </div>";

}
}
}

function search_dressf()
{
    global $con;
if(isset($_GET['search_dress']))
{
    
    $search_data=$_GET['search_data'];
    $search="Select * from `dress` where `keywords` like '%$search_data%' AND `gender`='F' ";
  

    $result=mysqli_query($con,$search);
    $rows=mysqli_num_rows($result);
    if($rows==0)
    {
        echo "<h2 style='text-align:center;color:rgb(217, 56, 56)'>Sorry! no result found.</h2>"; 
        
    }
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
          echo "<div class='col mb-2'>
          
          <div class='card' style='width: 18rem;'>
    <img src='dress_image/$image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$name</h5>
      <p class='card-text'>$desc</p>
      <a href='#' class='btn btn-primary'>Add to cart</a>
      <a href='#' class='btn btn-primary'>View</a>
    </div>
  </div>
  <!-- col end -->
          </div>";

        }
} 
}
?>
