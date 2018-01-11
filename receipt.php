<?php
/* If personal information is not given or incomplete  -> error message will appear on each input */
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
            margin: 0 auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        
        #container {
        text-align: center;        
            }    
        .underline {
        text-decoration: underline;
            }
        
        </style>
    </head>
    <body style="font-family:Arial">
        <div id="container">    
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
                $AmountToPay = 0;

                /* For each field in the $_POST array */
                foreach ($_POST as $index => $qty){
                    /* If the current index starts with "P_" , it means it is a product id and has a quantity */
                    if(strpos($index, 'P_') === 0 && $qty>0){
                        /* Get the product index, which is specified after P_, e.g P_3 means product index 3 */
                        $product=$products [substr($index, strpos($index, "_") + 1)];
                        /* Adding current product's total price to the total amount to pay */
                        $AmountToPay = $AmountToPay + priceCampaign($product["price"]) * $qty;
                        ?>
                        <tr><td><?php echo($product["name"]); ?></td> 
                        <td><?php echo($product["color"]); ?></td>
                        <td><?php echo(priceCampaign($product["price"])); ?> SEK</td>
                        <td><?php echo($qty)?></td>
                        <td><?php echo (priceCampaign($product["price"]) * $qty); ?> SEK</td>                
                        </tr>
                <?php } 
                }
                /* Checking whether the delivery can be made the next day, if yes then the total amount to pay will be reduced with 5% discount  */
                if (isDeliveryNextDay() ==True){
                    $AmountToPay = $AmountToPay * 0.95;
                }
                ?>
            </table>        
            <br><br><tr><strong><p class="underline">Amount to pay: <?php echo ($AmountToPay); ?> SEK </p></strong></tr>    

            <h2>Your personal information:</h2>

            Name: <?php echo ($_POST ["name"]); ?><br><br>
            Address: <?php echo ($_POST ["address"]); ?><br><br>
            Phone number: <?php echo ($_POST ["phonenumber"]); ?><br><br>
            E-mail: <?php echo ($_POST ["email"]); ?><br><br>
    </div>
    </body>
</html>