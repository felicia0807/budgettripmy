


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register page</title>

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

<form action="includes/signup.inc.php" method="post">

<h2>register now</h2>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	  <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

      
        <?php if (isset($_GET['name'])) { ?>
        <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
               <input type="text"  name="name" placeholder="Name"><br> <?php }?>
                     
                      
        <?php if (isset($_GET['uname'])) { ?>
               <input type="text"  name="uname"  placeholder="User Name"value="<?php echo $_GET['uname']; ?>"><br>                                                             
         <?php }else{ ?>
               <input type="text"  name="uname"  placeholder="User Name"><br> <?php }?>
    
       	<input type="password" name="password"  placeholder="Password"><br>
                 
        <input type="password"name="re_password" placeholder="Confirm Password"><br>
       <?php if (isset($_GET['email'])) { ?>
               <input type="email"  name="email"  placeholder="Email"value="<?php echo $_GET['email']; ?>"><br>                                                             
         <?php }else{ ?>
               <input type="email"  name="email"  placeholder="Email"><br> <?php }?>

               <?php if (isset($_GET['phoneno'])) { ?>
               <input type="tel"  name="phoneno"  placeholder="Phone Number"value="<?php echo $_GET['phoneno']; ?>"><br>                                                             
         <?php }else{ ?>
               <input type="tel"  name="phoneno"  placeholder="Phone Number"><br> <?php }?>               

               
       <input type="submit" name="submit" value="Sign up now" class="form-btn">
       <p>already have an account?<a href="login.php">Login Now</a></p> 
          
        
                 
                 




</form>

</div>
</body>