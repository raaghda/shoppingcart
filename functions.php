<?php 
/* If the day is the first of the week, ie Monday then return price + 1. Else return current price */
function priceCampaign($price){
    if(date('j', time()) === '1'){
        return $price / 2;    
    }
    if(date('j', time()) === '3'){
        return $price * 1.1;    
    }
     if(date('j', time()) === '5' && $price >= 200){ 
        return $price - 20;    
    }
    
    return $price;
}

?>