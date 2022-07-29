<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

    include 'includes/dbh.inc.php';
    $msg="";



  
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users_data WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
              $_SESSION['SESSION_EMAIL'] = $email;
              header("Location: index.php");
        } else {
            $msg = "<div class='alert alert-danger'>Wrong Email or Password</div>";
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
   <title>login page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="image" >
    <a href="index.php" >
    <img
        src="images/login_logo.jpg"
        height="100"
        alt="Logo"
        href="index.php"


      />
      </a>
    </div>

<div class="form-container">

<form action="" method="post">

<h2>Login</h2>
<?php echo $msg; ?>
<input type="text" name="email" placeholder="entet your email">
<input type="password" name="password" placeholder="entet your password">

<input type="submit" name="submit" value="Login" class="form-btn">
<p>Don't have an account?<a href="signup.php">Sign Up Now</a></p> 

</form>

</div>
</body>