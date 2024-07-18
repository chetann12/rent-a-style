<?php
// include 'localdb.php';
include 'webdb.php';

session_start();
$id=$_GET['update'];
$sql="SELECT * FROM `dress` WHERE `dress_id` = $id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$size=$row['size'];
$price=$row['price'];
$qty=$row['quantity'];
$occas=$row['occasions'];
$keyword=$row['keywords'];
$desc=$row['description'];
$image=$row['image1'];

if(isset($_POST['sub']))
{
  global $con;
$name=$_POST['nm'];
$size=$_POST['size'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$occas=$_POST['occas'];
$keyword=$_POST['keyword'];
$desc=$_POST['desc'];

//updating image
$image1=$_FILES['image1']['name'];
$image2=$_FILES['image2']['name'];
$image3=$_FILES['image3']['name'];

$tmpimage1=$_FILES['image1']['tmp_name'];
$tmpimage2=$_FILES['image2']['tmp_name'];
$tmpimage3=$_FILES['image3']['tmp_name'];

move_uploaded_file($tmpimage1,"./dress_image/$image1");
move_uploaded_file($tmpimage2,"./dress_image/$image2");
move_uploaded_file($tmpimage3,"./dress_image/$image3");
//

//id is int
$sql="UPDATE `dress` SET `dress_id` = $id, `name` = '$name', `size` = '$size',
 `price` = $price, `quantity` = $qty, `occasions` = '$occas' , 
 `keywords`='$keyword' `image1`='$image1' ,`image2`='$image2' ,`image3`='$image3' WHERE `dress_id` =$id";
$result=mysqli_query($con,$sql);

if($result)
{

    header('location: dressm.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rent A Style</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
  </head>
  <style>
#img_hieght{
  height: 300px;
  width: 300px;
  object-fit: contain;

}

    </style>
  <body>
  <h2 style="text-align: center;"  class="">Update dress details</h2>
  <div class="container my-4">
      
      
      <form  method="POST" enctype="multipart/form-data">
      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="nm" name="nm" autocomplete="off" value="<?php echo $name ;?>" />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Size</label>
        <input type="text" class="form-control" id="size" name="size" pattern="[A-Z ]{1,10}"
        title="Enter size in capital letter separated by space"
        autocomplete="off" value=<?php echo $size;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" 
         autocomplete="off" value=<?php echo $price;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Quantity</label>
        <input type="text" class="form-control" id="qty" name="qty"  autocomplete="off" value=<?php echo $qty;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Occasions</label>
        <input type="text" class="form-control" id="occas" name="occas" autocomplete="off" value=<?php echo $occas;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Description</label>
        <input type="text" class="form-control" id="desc" name="desc" autocomplete="off" value=<?php echo $desc ;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Keywords</label>
        <input type="text" class="form-control" id="keyword" name="keyword" autocomplete="off"  
        value=<?php echo $keyword;?> />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Dress Image 1</label>
           <?php echo "<img src='dress_image/$image' alt='.$image.' id='img_hieght'>"; ?>
        <input type="file" class="form-control" id="image1" 
        name="image1" 
          />
      </div>
      

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Dress Image 2</label>
        <input type="file" class="form-control" id="image2" name="image2" />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Dress Image 3</label>
        <input type="file" class="form-control" id="image3" name="image3" />
      </div>

      <div class="mb-3 w-50 m-auto">
      <input class="btn btn-primary" type="submit" value="Update Dress" name="sub">
      </div>

</form>
    </div>
  </body>
</html>