<?php


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    //     header 'index.php'; //
}
require 'products.php';
foreach ($_POST as $index => $qty){
    if(strpos($index, 'P_') === 0 && $qty>0){
        $product=$products [substr($index, strpos($index, "_") + 1)];
        var_dump($product);
        var_dump($qty);
    }
}

var_dump($_POST);
die();
/* If personal information is not given or incomplete  -> error message will appear */
if (!isset($_POST["name"]) or strlen($_POST["name"])==0){
    header('Location: index.php?missingname=1');
    die();
}

if (!isset($_POST["address"]) or strlen($_POST["address"])==0){
    header('Location: index.php?missingaddress=1');
    die();
}

if (!isset($_POST["phonenumber"]) or strlen($_POST["phonenumber"])==0){
    header('Location: index.php?missingphonenumber=1');
    die();
}

if (!isset($_POST["email"]) or strlen($_POST["email"])==0){
    header('Location: index.php?missingemail=1');
    die();
}

?>