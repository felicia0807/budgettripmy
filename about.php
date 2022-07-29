<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

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
      <a href="login.php">LOGIN</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>



<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
   <h1>about us</h1>
</div>



<section class="about">



   <div class="content">
      <h2>why choose us?</h2>
      <p>Our trip are born out of a desire to share authentic travel experiences. We are here to designed to your interests, tastes, and budget around the world.</p>

      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>top destinations</span>
         </div>
         <div class="icons">
            <i class="fas fa-coins"></i>
            <span>affordable price</span>
         </div>
      </div>
   </div>

</section>



<section class="reviews">

   

</section>









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script >
   var swiper = new Swiper(".reviews-slider", {
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