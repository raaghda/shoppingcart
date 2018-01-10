<?php 
/* If the day is the first of the week, ie Monday then return price + 1. Else return current price */
function priceCampaign($price){
    if(date('w', time()) === '1'){
        return $price / 2;    
    }
   
    if(date('w', time()) === '3'){
        return $price * 1.1;    
    }
     if(date('w', time()) === '5' && $price >= 200){ 
        return $price - 20;    
    }
    
    return $price;
}

/* Error msgs for required fields. Used in index */
function showError($errorMsg){
    if(isset($_GET[$errorMsg])){
        echo '<span class="requiredfield">* Required field </span>';
    }
}

/* Check whether delivery will be next day */
function isDeliveryNextDay(){
   $dayOfTheMonth = date('j', time());
   $weekNumber = date('W', time());
   $time = date('H', time());
    if ($dayOfTheMonth % 2 == 0 && $weekNumber % 2 != 0 && $time >= 13 && $time < 17) {
      return True; 
    }
    return False; 
}

?>