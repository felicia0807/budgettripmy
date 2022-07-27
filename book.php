<?php
include 'includes/dbh.inc.php';
include 'functions.php';

//try to add u-parameter for regex-pattern, because a string can have UTF-8 encoding:
if(isset($_POST['submit'])){
    $name   = $_POST['name'];
    $loc_id   = $_POST['loc_id'];
    $date   = $_POST['date'];
    $qty   = $_POST['qty'];
    $amount   = $_POST['amount'];


    $sql="insert into `bookings` (loc_id,date,qty,amount) values('$loc_id','$date','$qty','$amount')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:book.php?alert=add_successful&name=$name&date=$date&qty=$qty&amount=$amount");
    }else{
        die(mysqli_error($conn));
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking Page</title>
    <!-- Bootstrap css -->
<!-- Bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
<!-- Icon cdn -->
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">

<!-- Jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <?php
    if(isset($_GET['alert'])){
        if( $_GET['alert'] == 'add_successful'){
            echo "
            <script>
                $(document).ready(function() {
                    $('#exampleModalCenter').modal('show');
                });
            </script>
            ";

            $name   = $_GET['name'];
            $date   = $_GET['date'];
            $qty   = $_GET['qty'];
            $amount   = $_GET['amount'];
        }
    }
    ?>
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


</section>

<section class="previous" >
    <div>
    <a href="hotel.php" class="previous"  style="text-decoration:none; display:inline-block; padding: 8px 16px; margin:10px;  ">&#8249; Back</a>
    </div>

</section>
    <?php

        if(isset($_GET['location_id']))
        {
            $location_id = $_GET['location_id'];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/attractions/get-details?location_id=$location_id&currency=MYR&lang=en_US",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 45,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                    "X-RapidAPI-Key: d2d0e2790bmsh1a53aa6e0f84e92p1b155cjsn1105b97295fe"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $reponseObjArr = json_decode($response, true);
                
                $attr = getAttraction($reponseObjArr);
                $attrName = $attr['name'];
                $attrPrice = str_replace("MYR","",$attr['price']);
                $attrPrice = preg_replace('/\s+/u','',$attrPrice );
                $attrImg = $attr['img'];

    
            }
        }else{
            $location_id = "";
            $attrName = "";
            $attrPrice = "";
            $attrImg = "https://www.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png";
        }
    ?>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-label="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Congratulations</h5>
            </div>
            <div class="modal-body">
                <h1 class="h1 text-center">✅</h1>
                <p class="text-left">Your booking in <?php echo $name; ?> on <?php echo $date; ?> was successful! </p>
                <p class="text-left">Adult number: <?php echo $qty; ?> </p>
                <p class="text-left">Total Amount: MYR <?php echo $amount; ?> </p>
            </div>
            <div class="modal-footer">
                <a href='home.php' class='btn btn-primary'>Go Back to Home Page</a>
            </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <div class="row">
            <div class="col-lg-4">
            <figure class="figure">
                <img src="<?php echo $attrImg ?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption"><?php echo $attrName ?></figcaption>
            </figure>
            </div>
            <div class="col-lg-8">
                <form method="POST">

                    <!-- Location id -->
                    <input type="hidden" id="loc_id" name="loc_id" value="<?php echo $location_id ?>">
                    
                    <!-- Attraction name -->
                    <input type="hidden" id="name" name="name" value="<?php echo $attrName ?>">

                    <!-- Booking Date -->
                    <div class="form-group my-3">
                        <label>📅 Date</label>
                        <input type="date" id="date" class="form-control" name="date" autocomplete="off">
                    </div>
                    

                    <!-- Adult, price, quantity -->
                    <div class="cart-container">
                        <label>Adult</label>
                        
                        <p> MYR <span id="price"><?php echo $attrPrice ?></span></p>

                        <div class="inputCounter">
                            <button type="button" class="btn" id="minus"><i class='bx bx-minus'></i></button>
                            <input type="text" id="counter" class="form-control rounded" style="float:right ;"  placeholder="" name="qty" value="1" readonly/>
                            <button type="button" class="btn" id="plus"><i class='bx bx-plus' ></i></button>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="adultAmountContainer my-3">
                        <p><strong>Total</strong></p>
                        <p>MYR <span id="totalAmount"><?php echo $attrPrice ?></span></p>
                    </div>
                    <input type="hidden" id="amount" name="amount" value="<?php echo $attrPrice ?>">


                    <div class='text-center'>
                        <button type="submit" class="btn btn-primary" name="submit">👆 Book Now</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    <script >
        let minusBtn = document.querySelector("#minus")
let plusBtn = document.querySelector("#plus")
let counterElement = document.querySelector("#counter")
console.log(counterElement);
  let counter = counterElement.value;




minusBtn.addEventListener('click', function () {
    if (counter >= 1) {
        counter--
    }
    counterElement.value = counter; 
    updateAmount()
})

plusBtn.addEventListener('click', function () {
    counter++
    counterElement.value = counter; 
    updateAmount()
})

function updateAmount() {
    let totalAmountElement = document.querySelector("#totalAmount")
    let amount = document.querySelector("#amount")
    
    totalAmount = price.textContent * counter

    totalAmountElement.textContent = totalAmount.toFixed(2)
    amount.value = totalAmount.toFixed(2)

}
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>