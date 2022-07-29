<?php
 session_start();
//  if (!isset($_SESSION['SESSION_EMAIL'])) {
 //  header("Location: login.php");
  // die();
//}

include 'includes/dbh.inc.php';

//$query = mysqli_query($conn, "SELECT * FROM users_data WHERE email='{$_SESSION['SESSION_EMAIL']}'");

//if (mysqli_num_rows($query) > 0) {
//   $row = mysqli_fetch_assoc($query);
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<section class="header" style="background-color: #ECEFF1;">

<a class="navbar-brand me-2" href="index.php">
      <img
        src="images/logo2.jpg"
        height="48"
        alt="Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

   <nav class="navbar" >
      <a href="attractions.php">VIEWS</a>
      <a href="about.php">ABOUT US</a>
      <a href='login.php'>LOGIN</a>
      <!--?php if(empty($row['name'])){
      "<a href='login.php'>LOGIN</a>";
      }
       else{
         echo "<a>Welcome " . $row['name'] . "</a>";
       }


      ?-->


   
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>


<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/image4.jpg) no-repeat">
            <div class="content">
               <h3>travel arround Malaysia</h3>

            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/image2.jpg) no-repeat">
            <div class="content">         
               <h3>discover the new places</h3>

            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/image3.jpg) no-repeat">
            <div class="content">            
               <h3>make your tour worthwhile</h3>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next" ></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>



<section class="attractions">

   <h1 class="heading-title">  best places to go </h1>

   <div class="swiper attr-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
         <img src="images/msia1.jpg" alt="">
            <h3>Sabah, Malaysia</h3>
            <a href="attractions.php" class="btn">discover more</a>
       
         </div>

         <div class="swiper-slide slide">
         <img src="images/msia2.jpg" alt="">
            <h3>Kuala Lumpur, Malaysia</h3>
            <a href="attractions.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/msia3.jpg" alt="">
            <h3>Penang, Malaysia</h3>

            <a href="attractions.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/img5.jpg" alt="">
            <h3>Malacca, Malaysia</h3>
            <a href="package.php" class="btn">discover more</a>
           
         </div>


      </div>

   </div>

</section>

<section class="attractions" style="background:white ;">

   <h1 class="heading-title">  best places for food </h1>

   <div class="swiper attr-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
         <img src="images/chambers.jpg" alt="">
            <h3>Chambers Grill @ Kuala Lumpur</h3>
            <a href="restaurant.php" class="btn">discover more</a>
       
         </div>

         <div class="swiper-slide slide">
         <img src="images/positano.jpg" alt="">
            <h3>Positano Risto @ Publika Shopping Gallery</h3>
            <a href="restaurant.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/canopy.jpg" alt="">
            <h3>Canopy Rooftop Bar & Lounge @Jalan Yap Kwan Seng</h3>
            <a href="restaurant.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/ishin.jpg" alt="">
            <h3>Ishin Japanese Dining @Klang Lama</h3>
            <a href="restaurant.php" class="btn">discover more</a>
           
         </div>


      </div>

   </div>

</section>

<section class="attractions">

   <h1 class="heading-title">  best places to stay </h1>

   <div class="swiper attr-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
         <img src="images/sky.jpg" alt="">
            <h3>genting skyworlds hotel</h3>
            <h4>Price starting from MYR150</h4>
            <a href="hotel.php" class="btn">discover more</a>
       
         </div>

         <div class="swiper-slide slide">
         <img src="images/crock.jpg" alt="">
            <h3>crockfords resorts world genting</h3>
            <h4>Price starting from MYR100</h4>
            <a href="hotel.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/ampang.jpg" alt="">
            <h3>ampang inn hotel</h3>
            <h4>Price starting from MYR80</h4>
            <a href="hotel.php" class="btn">discover more</a>
            
         </div>

         <div class="swiper-slide slide">
         <img src="images/shangrila.jpg" alt="">
            <h3>shangri la hotel and resort</h3>
            <h4>Price starting from MYR200</h4>
            <a href="hotel.php" class="btn">discover more</a>
           
         </div>


      </div>

   </div>

</section>



<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script>

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};

 var swiper = new Swiper(".home-slider", {
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
 });

 var swiper = new Swiper(".attr-slider", {
    grabCursor:true,
    loop:true,
    autoHeight:true,
    spaceBetween: 20,
    breakpoints: {
       0: {
         slidesPerView: 1,
       },
       700: {
         slidesPerView: 2,
       },
       1000: {
         slidesPerView: 3,
       },
    },
  });

</script>

</body>
</html>