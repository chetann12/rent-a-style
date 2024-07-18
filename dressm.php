<?php
session_start();
if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){

header("location: admin_login.php");

}
// change to index.php because location in update and delete is index
// include 'localdb.php';
include 'webdb.php';
 $insert=false;
 
  
if(isset($_POST['sub']))
{
$name=$_POST['nm'];
$size=$_POST['size'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$gender=$_POST['gender'];
$occas=$_POST['occas'];
$desc=$_POST['desc'];
$keyword=$_POST['keywords'];



//images

$image1=$_FILES['image1']['name'];
$image2=$_FILES['image2']['name'];
$image3=$_FILES['image3']['name'];

$tmpimage1=$_FILES['image1']['tmp_name'];
$tmpimage2=$_FILES['image2']['tmp_name'];
$tmpimage3=$_FILES['image3']['tmp_name'];

move_uploaded_file($tmpimage1,"./dress_image/$image1");
move_uploaded_file($tmpimage2,"./dress_image/$image2");
move_uploaded_file($tmpimage3,"./dress_image/$image3");

//inserting product





$sql="INSERT INTO `dress` ( `name`, `size`, `price`, `quantity`,`gender`, 
`occasions`,`description`,`keywords`,`image1`,`image2`,`image3`)
 VALUES ('$name', '$size', '$price', '$qty','$gender', 
 '$occas','$desc','$keyword','$image1','$image2','$image3')";

$result=mysqli_query($con,$sql);
$insert=true;


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
    <style>
#img_hieght{
  height: 100px;
  width: 100px;
  object-fit: contain;

}

    </style>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Rent A Style</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active"
                href="#"
                >Admin Page</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                href="admin_logout.php"
                >Logout</a
              >
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
    <?php 
    if($insert)
    {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success </strong> Dress added successfully.
    <button type='button'
     class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    
    }
    ?>
    <!-- form for inserting data -->
    <div class="container my-3">
      
      <h2 class="text-md-center" >Add dress</h2>
      <form  method="POST" enctype="multipart/form-data">

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="nm" name="nm" autocomplete="off" required />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Size</label>
        <input type="text" class="form-control" id="size" name="size" 
        pattern="[A-Z ]{1,7}" autocomplete="off" required title="Enter size in capital letter separated by space" />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Gender</label>
        <select class="form-select" aria-label="Default select example" name="gender">
   
       <option value="M">M</option>
      <option value="F">F</option>
      </select>
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" autocomplete="off" required />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Quantity</label>
        <input type="text" class="form-control" id="qty" name="qty" autocomplete="off" required />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Occasions</label>
        <input type="text" class="form-control" id="occas" name="occas" autocomplete="off" required />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Keywords</label>
        <input type="text" class="form-control" id="keyword" name="keywords" autocomplete="off" required />
      </div>

      <div class="mb-3 w-50 m-auto">
        <label for="exampleFormControlInput1" class="form-label"
          >Dress Image 1</label>
        <input type="file" class="form-control" id="image1" name="image1" required />
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
      <input class="btn btn-primary mb-3 p-2" type="submit" value="Add Dress" name="sub">
      </div>

</form>
    </div>
   <div class="container">
   
    
    <?php
    $sql="SELECT * FROM `dress`";
    ?>
    <table class="table" >
    <thead>
      <tr>
        <th scope="col">Dress ID</th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>        
        <th scope="col">Occasions</th>
        <th scope="col">Image</th>
       
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php 
      $sql1="SELECT * FROM `dress`";
      $res=mysqli_query($con,$sql1);
      while($row=mysqli_fetch_assoc($res))
      {
$dress=$row['dress_id'];
$image=$row['image1'];
echo "<tr>
<td>".$dress."</td>
<td>".$row['name']."</td>
<td>".$row['size']."</td>
<td>".$row['price']."</td>
<td>".$row['quantity']."</td>
<td>".$row['occasions']."</td>
<td><img src='dress_image/$image' alt='.$image.' id='img_hieght'></td>

<td><button type='button' class='btn btn-primary'><a href='update.php?update=".$dress."' class='text-light text-decoration-none'>Update</a></button>
   <button type='button' class='btn btn-danger'><a href='delete.php?deleteid=".$dress."' class='text-light text-decoration-none'>Delete</a></button></td>
</tr>";

      }


      
      ?>
      
    </tbody>
  </table>
    
    

   </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
