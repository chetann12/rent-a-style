<?php 
session_start();
include('localdb.php');
if(!isset($_SESSION['user_id1'])){
$_SESSION['from_booking_alert']=1;
 header('location: sign.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking dress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" class="rel">
</head>
<body>
    <h3 class="text-center m-4" >Confirm Booking</h3>
    <br>
    <div class="container-fluid m-3">
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
          <div class="row">

        <?php
        
        // displaying records
       if(isset($_GET['dressid']))
       {
        $get_dress_id=$_GET['dressid'];
        $display="Select * from `dress` where `dress_id`=$get_dress_id";
        
        $result=mysqli_query($con,$display);
        $row=mysqli_fetch_assoc($result);
        
          $name=$row['name'];
        //   $available_size=$row['size'];
          $price=$row['price'];
        //   $qty=$row['quantity'];
        //   $occas=$row['occasions'];
          $desc=$row['description'];
          $image1=$row['image1'];
          $image2=$row['image2'];
          $image3=$row['image3'];
        //   $dressid=$row['dress_id'];

          $rent_days=$_GET['rdays'];

          if($rent_days=="2"){
            $r_price=$price;
            $refund_price=$r_price;
          }
          elseif($rent_days=="3"){
            $inc= ($price*10)/100;
            $r_price=$price+$inc;
            $refund_price=$r_price;
          }
          elseif($rent_days=="4"){
            $inc= ($price*20)/100;
            $r_price=$price+$inc;
            $refund_price=$r_price;
          }
          elseif($rent_days=="5"){
            $inc= ($price*30)/100;
            $r_price=$price+$inc;
            $refund_price=$r_price;
          }
          else{
            $inc= ($price*40)/100;
            $r_price=$price+$inc;
            $refund_price=$r_price;
          }
         $total=$refund_price+$r_price;

         $sdate=$_GET['sdate'];
         $formatsdate= date("d-m-Y",strtotime($sdate));

         $edate=$_GET['edate'];
         $formatedate= date("d-m-Y",strtotime($edate));

          
          echo "<div class='col'>
          <div class='col-sm-4'>
          <div class='card'style='width: 18rem;'>
          <img src='dress_image/$image1' class='card-img-top img-thumbnail' alt='...'>
          <div class='card-body'>
        
            <h5 class='card-title'>$name</h5><p>Price <span id='price_change'>$r_price
            </span>
            <br>
            $desc";
        
         
       
         
       
        echo "</div>
        </div>
        <!-- col end -->
          </div>";
          
        
    }
      ?>
          </div>
      <div class="col">
        <h3>Your Booking Details</h3>
        
        <label><b>Start Date : </b> <?php echo $formatsdate; ?></label>
        <br>
        <label><b>Return Date : </b> <?php echo  $formatedate; ?></label>
        <br>
        <label><b>Rental Duration : </b> <?php echo $_GET['rdays']; ?> Days</label>
        <br>
        <label><b>Rental Price : </b> <?php echo $r_price ; ?> ₹</label>
        <br>
        <label><b>Refundable deposit : </b> <?php echo $refund_price ; ?> ₹</label>
        <br>
        <label><b>Total Price : </b> <?php echo $total ; ?> ₹</label>
        <br>
        <input type="submit" value="Placed Order" class="btn btn-outline-success mt-2">
      
      </div>
        </div>
          </div>
            </div>
              </div>
    
        
         <!-- <a href='view_more.php?dressid=$dressid' class='btn btn-primary'>View</a> -->
        <!-- row end -->
 
    
</body>
</html>