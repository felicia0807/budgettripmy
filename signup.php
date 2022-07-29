<?php

    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    //require 'vendor/autoload.php';


include 'includes/dbh.inc.php';

$msg="";

if(isset($_POST['submit'])){

      $name=mysqli_real_escape_string($conn,$_POST['name']);
      $username=mysqli_real_escape_string($conn,$_POST['username']);
      $password=mysqli_real_escape_string($conn,md5($_POST['password']));
      $re_password=mysqli_real_escape_string($conn,md5($_POST['re_password']));
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phoneno=mysqli_real_escape_string($conn,$_POST['phoneno']);
      $code = mysqli_real_escape_string($conn, md5(rand()));

      if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users_data WHERE email='{$email}'")) > 0) {

            
            $msg="<div class='alert alert-danger'>{$email} is already exists</div>";

      }
      else{
            if($password === $re_password){
              
                  $sql="INSERT INTO users_data (name, user_name, password, email, phoneno, code) VALUES('{$name}','{$username}','{$password}','{$email}','{$phoneno}','{$code}')";
                  $result=mysqli_query($conn, $sql);

                  if($result){

                          $msg="<div class='alert alert-info'>Register successfully</div>";
                  }else{

                        $msg="<div class='alert alert-danger'>Something went wrong!</div>";
                  }

            }
            else{
      
                  $msg="<div class='alert alert-danger'>Password not match</div>";
            }

      }
     
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register page</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="image">
    <img
        src="images/login_logo.jpg"
        height="100"
        alt="Logo"

      />
    </div>

<div class="form-container">

<form action="" method="post">

<h2>register now</h2>
        <?php 
         echo $msg
     	  ?>
      
        <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
        <input type="text" class="username" name="username" placeholder="Enter Your Username" value="<?php if (isset($_POST['submit'])) { echo $username; } ?>" required>
        <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required> 
        <input type="password" name="password"  placeholder="Password"><br>             
        <input type="password"name="re_password" placeholder="Confirm Password"><br>
        <input type="text" class="phoneno" name="phoneno" placeholder="Enter Your Phone No" value="<?php if (isset($_POST['submit'])) { echo $phoneno; } ?>" required> 
             

               
       <input type="submit" name="submit" value="Sign up now" class="form-btn">
       <p>already have an account?<a href="login.php">Login Now</a></p> 
          
        
                 
                 




</form>

</div>
</body>