<?php
    function getAttraction($attr){
        $attraction = array();
        $img = "";
        $name = "";
        $description = "";
        $price = "";
        $rating = "";
        $location_id = "";
        $parent_display_name="";
        $address=null;

        


        
        if(isset($attr['photo']['images']['original']['url'])){
            $img = $attr['photo']['images']['original']['url'];
        }
        if(isset($attr['name'])){
            $name = $attr['name'];
        }
        if(isset($attr['description'])){
            $description = $attr['description'];
        }
        
        if(isset($attr['rating'])){
            $rating =  $attr['rating'];
        }
        if(isset($attr['offer_group']['lowest_price'])){
            $price = $attr['offer_group']['lowest_price'];
        }
        if(isset($attr['location_id'])){
            $location_id = $attr['location_id'];
        }

        if(isset($attr['parent_display_name'])){
            $parent_display_name = $attr['parent_display_name'];
        }   
        
        if(isset($attr['address'])){
            $address = $attr['address'];
        }      
    
        $attraction['img'] = $img;
        $attraction['name'] = $name;
        $attraction['description'] = $description;
        $attraction['price'] = $price;
        $attraction['rating'] = $rating;       
        $attraction['location_id'] = $location_id;
        $attraction['parent_display_name'] = $parent_display_name;
        $attraction['address'] = $address;  
        return $attraction;
    }

    function getStars($starRating){
        $stars = "";
        $totalStars = 5;
        $starRating = floatval( $starRating );

        for ($i = 1; $i <= $totalStars; $i++) {
            if($starRating < $i ) {
                if(is_float($starRating) && (round($starRating) == $i)){
                    $stars .= "<i class='bx bxs-star-half starsss' ></i>";
                }else{
                    $stars .= "";
                }
            }else {
                $stars .= "<i class='bx bxs-star starsss' ></i>";
            }
        }

        return $stars;
    }

    function getAttractionCard($attr){
        $stars = getStars($attr['rating']);
        
        if (empty($attr['img'])){
    
            return '';

        }
       
        return "
        <div class='col-md m-1'>
            <div class='card h-100'>
                <img class='card-img-top' src='{$attr['img']}' alt='Card image cap' style='width:100%;height:180px;background-size: cover;'>
        
                <div class='card-body'>
                <h1 class='card-title'>{$attr['parent_display_name']}</h1>                 
                    <h3 class='card-title'>{$attr['name']}</h3>
                    <p class='card-text description'>{$attr['description']}</p>
                    <button onclick='readMore(this)' type='button' class='btn'>Read More</button>
                    <p class='card-text'></p>                  
                    <ul class='list-group list-group-flush ratePrice'>
                        <li class='list-group-item'>{$stars}</li>
                    </ul>
                    <h5='card-text description'>Address: {$attr['address']}</h5>
                </div>
        
            </div>
        </div>
        
        ";  
  
    }


    function getRestaurant($rest){
        $restaurant = array();
        $img = "";
        $name = "";
        $description = "";
        $address="";
        $price_level = "";
        $rating = "";
        $location_id = "";
        $phone = "";
        
        if(isset($rest['photo']['images']['original']['url'])){
            $img = $rest['photo']['images']['original']['url'];
        }
        if(isset($rest['name'])){
            $name = $rest['name'];
        }
        if(isset($rest['description'])){
            $description = $rest['description'];
        }
        
        if(isset($rest['rating'])){
            $rating =  $rest['rating'];
        }
        if(isset($rest['address'])){
            $address=  $rest['address'];
        }
        if(isset($rest['location_id'])){
            $location_id = $rest['location_id'];
        }
        if(isset($rest['price_level'])){
            $price_level = $rest['price_level'];
        }
        if(isset($rest['phone'])){
            $phone = $rest['phone'];
        }
    
        $restaurant['img'] = $img;
        $restaurant['name'] = $name;
        $restaurant['description'] = $description;
        $restaurant['rating'] = $rating;
        $restaurant['address'] = $address;
        $restaurant['location_id'] = $location_id;
        $restaurant['price_level'] = $price_level;
        $restaurant['phone'] = $phone;
        return $restaurant;
    }

    function getStarss($starRating){
        $stars = "";
        $totalStars = 5;
        $starRating = floatval( $starRating );

        for ($i = 1; $i <= $totalStars; $i++) {
            if($starRating < $i ) {
                if(is_float($starRating) && (round($starRating) == $i)){
                    $stars .= "<i class='bx bxs-star-half starsss' ></i>";
                }else{
                    $stars .= "";
                }
            }else {
                $stars .= "<i class='bx bxs-star starsss' ></i>";
            }
        }

        return $stars;
    }

    function getRestaurantCard($rest){
        $stars = getStarss($rest['rating']);
        if (empty($rest['img'])){
    
            return '';

        }
        return "
        <div class='col-md m-1'>
            <div class='card h-100'>
                <img class='card-img-top' src='{$rest['img']}' alt='Card image cap' style='width:100%;height:180px;background-size: cover;'>
        
                <div class='card-body'>
                    <h2 class='card-title'>{$rest['name']}</h2>
                    <p class='card-text description'>{$rest['description']}</p>
                    <button onclick='readMore(this)' type='button' class='btn'>Read More</button>
                    <p class='card-text'></p>
                    <h5 class='card-text description'>Address : {$rest['address']}</h5>
                    <h6 class='card-text description'>Phone No : {$rest['phone']}</h6>
                    <p class='card-text'></p>
                    <ul class='list-group list-group-flush ratePrice'>
                    <li class='list-group-item price_text'> Price Range : {$rest['price_level']}</li>                    
                        <li class='list-group-item'>{$stars}</li>
                    </ul>
                </div>
        
            </div>
        </div>
        
        ";
    }

    function getHotel($hotl){
        $hotel = array();
        $img = "";
        $name = "";
        $description = "";
        $address="";
        $price = "";
        $rating = "";
        $location_id = "";
        $location_string="";
        
        if(isset($hotl['photo']['images']['original']['url'])){
            $img = $hotl['photo']['images']['original']['url'];
        }
        if(isset($hotl['name'])){
            $name = $hotl['name'];
        }
        if(isset($hotl['description'])){
            $description = $hotl['description'];
        }
        
        if(isset($hotl['rating'])){
            $rating =  $hotl['rating'];
        }
        if(isset($hotl['address'])){
            $address=  $hotl['address'];
        }
        if(isset($hotl['price'])){
            $price = $hotl['price'];
        }
        if(isset($hotl['location_id'])){
            $location_id = $hotl['location_id'];
        }
        if(isset($hotl['location_string'])){
            $location_string = $hotl['location_string'];
        }
    
        $hotel['img'] = $img;
        $hotel['name'] = $name;
        $hotel['description'] = $description;
        $hotel['rating'] = $rating;
        $hotel['price'] = $price;
        $hotel['address'] = $address;
        $hotel['location_id'] = $location_id;
        $hotel['location_string'] = $location_string;
        return $hotel;
    }

    function getStarsss($starRating){
        $stars = "";
        $totalStars = 5;
        $starRating = floatval( $starRating );

        for ($i = 1; $i <= $totalStars; $i++) {
            if($starRating < $i ) {
                if(is_float($starRating) && (round($starRating) == $i)){
                    $stars .= "<i class='bx bxs-star-half starsss' ></i>";
                }else{
                    $stars .= "";
                }
            }else {
                $stars .= "<i class='bx bxs-star starsss' ></i>";
            }
        }

        return $stars;
    }

    function getHotelCard($hotl){
        $stars = getStarss($hotl['rating']);
        if (empty($hotl['img'])){
    
            return '';

        }
        return "
        <div class='col-md m-1'>
            <div class='card h-100'>
                <img class='card-img-top' src='{$hotl['img']}' alt='Card image cap' style='width:100%;height:180px;background-size: cover;'>
        
                <div class='card-body'>
                    <h1 class='card-title'>{$hotl['location_string']}</h1>
                    <h3 class='card-title'>{$hotl['name']}</h3>
                    <p class='card-text description'>{$hotl['description']}</p>
                    <h5 class='card-text description'>Address : {$hotl['address']}</h5>
                    <button onclick='readMore(this)' type='button' class='btn btn-info btn-sm'>Read More</button>
                    <p class='card-text'></p>
                    <ul class='list-group list-group-flush ratePrice'>
                        <li class='list-group-item price_text'> Price : {$hotl['price']}</li> 
                        <li class='list-group-item'>{$stars}</li>
                    </ul>
                </div>
        
                <div class='card-footer text-center'>
                    <a href='book.php?location_id={$hotl['location_id']}' class='btn btn-info'><i class='bx bxs-cart' ></i> Book Now</a>
                </div>
            </div>
        </div>
        
        ";
    }

?>