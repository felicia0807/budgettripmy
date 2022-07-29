<?php
include 'includes/dbh.inc.php';
include 'functions.php';

if(isset($_GET['search_word'])){
    $hotel_name = $_GET['search_word'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Budget Trip</title>
    <!-- Bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- CSS Styling -->
<link rel="stylesheet"  href="css/style.css"/>
    
<!-- Icon cdn -->
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">

<!-- Jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   <a href="attractions.php"  style="text-decoration:none;">VIEWS</a>
      <a href="about.php"  style="text-decoration:none;">ABOUT US</a>
      <a href="login.php"  style="text-decoration:none;">LOGIN</a>

   
   </nav>

   <div id="menu-btn" class="bx bx-menu"></div>

</section>

        <div class="heading" >
        <h1 style="color:black ;">Hotels</h1>
        </div>

    <div class="container">
        <!-- Search Bar -->
        <!-- https://www.w3schools.com/php/php_form_validation.asp -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="my-3">
            <div class="wrapper">
                <div class="search-input">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" name="search_word" />
                <div class="icon"><i class='bx bx-search-alt' ></i></div>
                </div>
    
            </div>

            <select onchange="location = this.value;">
                <option value="attractions.php">Hotel</option>
                <option value="restaurant.php">Attractions</option>
                <option value="hotel.php">Restaurant</option>

        </select>
        </form>

    
    <?php
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list-in-boundary?bl_latitude=2.7215318850480217&bl_longitude=101.46800174138653&tr_longitude=102.49796994063418&tr_latitude=4.147152543845292&limit=30&currency=MYR&subcategory=hotel%2Cbb%2Cspecialty&adults=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                "X-RapidAPI-Key: 61008f925amshe10cdf1d8da1c9dp10faeajsn82fdf95c5606"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $no = 0;

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $reponseObjArr = json_decode($response, true);
            foreach ( $reponseObjArr['data'] as $hotels){
                if($no % 3 == 0){
                    echo '<div class="row">';
                }



                $hotl = getHotel($hotels);

                if(isset($hotel_name)){
                    if($hotel_name == ""){
                        echo getHotelCard($hotl);
                        $no += 1;
                    }else{
                        if( strpos( strtolower($hotl['name']) , $hotel_name) !== false ){
                            echo getHotelCard($hotl);
                            $no += 1;
                        }
                    }
                }else{
                    echo getHotelCard($hotl);
                    $no += 1;
                }
                



                
                if($no % 3 == 0){
                    echo '</div>';
                }
            }
        }

    ?>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>