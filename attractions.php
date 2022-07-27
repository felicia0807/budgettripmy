<?php
include 'includes/dbh.inc.php';
include 'functions.php';

if(isset($_GET['search_word'])){
    $attraction_name = $_GET['search_word'];
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

<a class="navbar-brand me-2" href="home.php">
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
      <a href="login.php"  style="text-decoration:none;">Login</a>

   
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

   

</section>

        <div class="heading" style="background:url(images/header-background-01.png) no-repeat" >
        <h1>top destinations</h1>
        </div>

    <div class="container">
        <!-- Search Bar -->
        <!-- https://www.w3schools.com/php/php_form_validation.asp -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="my-3">
        
            <div class="input-group">
                <div class="search-container">
                <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" name="search_word" />
                <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt' ></i></button>
                </div>
    
            </div>

            <select onchange="location = this.value;">
                <option value="attractions.php">Attraction</option>
                <option value="restaurant.php">Restaurant</option>
                <option value="hotel.php">Hotel</option>

        </select>
        </form>

        


    
    <?php
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/attractions/list-in-boundary?tr_longitude=99.69745249607337&tr_latitude=6.368770398959322&bl_longitude=104.19635357752877&bl_latitude=1.602664389887483&currency=MYR&lunit=km&lang=en_US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 45,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                "X-RapidAPI-Key: 3940bd9bf8mshf25e4fda864a1d9p101c88jsnb92a927bc07e"
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
            foreach ( $reponseObjArr['data'] as $attractions){
                if($no % 3 == 0){
                    echo '<div class="row">';
                }



                $attr = getAttraction($attractions);

                if(isset($attraction_name)){
                    if($attraction_name == ""){
                        echo getAttractionCard($attr);
                        $no += 1;
                    }else{
                        if( strpos( strtolower($attr['name']) , $attraction_name) !== false ){
                            echo getAttractionCard($attr);
                            $no += 1;
                        }
                    }
                }else{
                    echo getAttractionCard($attr);
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