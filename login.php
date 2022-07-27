
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login page</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="image" >
    <a href="home.php" >
    <img
        src="images/login_logo.jpg"
        height="100"
        alt="Logo"
        href="home.php"


      />
      </a>
    </div>

<div class="form-container">

<form action="includes/login.inc.php" method="post">

<h2>Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
<input type="text" name="username" placeholder="entet your username">
<input type="password" name="password" placeholder="entet your password">

<input type="submit" name="submit" value="Login" class="form-btn">
<p>Don't have an account?<a href="signup.php">Sign Up Now</a></p> 

</form>

</div>
</body>