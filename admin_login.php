<?php
include('localdb.php');
// include('webdb.php');
if(isset($_POST['loginbtn'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    


    $user_select="select * from `admin` where `admin_id`='$username'";
    $result=mysqli_query($con,$user_select);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    

    if($row_count>0){
        
        if($row_data['password']==$password){
            // login successfull
         session_start();   
        $_SESSION['admin']=$username;
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong></strong>Login Successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header('location: dressm.php');
        // header('location:index.php');
// echo $_SESSION['username1'];
        }else{
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong></strong>Invalid credentials
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }



    }else{
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong></strong>Invalid credentials
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }


}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <!-- <link rel="stylesheet" href="loginstyle.css"> -->
     <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

 .loginbtn{
border: none;
color: white;
outline: none;
width: 100%;
background-color: black;
border-radius: 4px;
font-weight: bold;
height: 40px;
 }

 .loginbtn:hover{
    background-color: white;
    color: black;
    border: 1px solid;
 }

 .row{
    background-color: white;
    border-radius: 30px;
    box-shadow: 12px 12px 22px grey;
 }


     </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(231, 234, 255) ;">
     
  <section class="form my-5">
        <div class="container">
            <div class="row">
                 
                <div class="col-lg-7 px-5 pt-5">
                    <h3 class="font-weight-bold py-3">Admin Login</h3>
                    <form action="" method="POST">
                        <!-- username -->
                        <div class="form-row my-3">
                            <div class="col-lg-7">
                                <input type="text"
                                 class="form-control my-3 p-2"  name="username" 
                                 placeholder="username">
                            </div>
                        </div>  
                        <!-- password -->
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password"
                                 class="form-control 
                                 my-3 p-2" name="password" placeholder="password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="submit" class="loginbtn mt-3 mb-4" 
                                value="Login" name="loginbtn">
                            </div>
                        </div>

                            <!-- <a href="#">Forgot password?</a>
                            <p class="">Don't have an account? <a href="signup.php">Register now</a></p> -->
                    </form>
                </div>
            </div>
        </div>
     </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>

</html>