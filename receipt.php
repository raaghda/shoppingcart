<?php
/* If personal information is not given or incomplete  -> error message will appear */
if (!isset($_POST["name"]) or strlen($_POST["name"])==0){
    header('Location: index.php?missingname=1');
} else if (!isset($_POST["address"]) or strlen($_POST["address"])==0){
    header('Location: index.php?missingaddress=1');
} else if (!isset($_POST["phonenumber"]) or strlen($_POST["phonenumber"])==0){
    header('Location: index.php?missingphonenumber=1');
} else if (!isset($_POST["email"]) or strlen($_POST["email"])==0){
    header('Location: index.php?missingemail=1');
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <title>Tech-Wizzard</title>
        
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 85%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
    </head>
    
    <body style="font-family:Arial">
        <h1>Tech-Wizzard Company</h1>    
   
<?php 
setlocale(LC_TIME, "");
setlocale(LC_TIME, "sv_SE");
echo strftime("%A den %d %B %Y");
?><br><br>
        
<table>
  <tr>
    <th>Product</th>
    <th>Color</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total Price</th>
  </tr>
        <?php
        require 'products.php';
        require 'functions.php';
        
        foreach ($_POST as $index => $qty){
            if(strpos($index, 'P_') === 0 && $qty>0){
                $product=$products [substr($index, strpos($index, "_") + 1)];
                ?>
                <tr><td><?php echo($product["name"]); ?></td> 
                <td><?php echo($product["color"]); ?></td>
                <td><?php echo(priceCampaign($product["price"])); ?> SEK</td>
                <td><?php echo($qty)?></td>
                <td><?php echo (priceCampaign($product["price"]) * $qty); ?> SEK</td>
                
                </tr>
        <?php } 
        }?>
        </table>        
        
        
<h2>Your personal information:</h2>

    Name: <?php echo ($_POST ["name"]); ?><br><br>
    Address: <?php echo ($_POST ["address"]); ?><br><br>
    Phone number: <?php echo ($_POST ["phonenumber"]); ?><br><br>
    E-mail: <?php echo ($_POST ["email"]); ?><br><br>
    </body>

</html>

<?php 
var_dump($_POST);

?>