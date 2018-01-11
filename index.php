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
        .requiredfield {
            color: red;
            font-size: 13px;
            }
            
        </style>
    </head>
    
    <body style="font-family:Arial">
        <h1>Tech-Wizzard Company</h1>    

        <?php 
        /* Set time to swedish time zone */
        setlocale(LC_TIME, "");
        setlocale(LC_TIME, "sv_SE");
        echo strftime("%A den %d %B %Y");

        require 'functions.php';
        if (isDeliveryNextDay() ==True){
            echo ("<br>Varorna kan levereras redan nästa arbetsdag och hela beställningen har fått en 5% rabatt.");
        }

        ?><br><br>        
        
        <form method="post" action="receipt.php">  
            <table>
              <tr>
                <th>Product</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
                <?php
                require 'products.php';

                foreach ($products as $index => $product){?>
                <tr><td><?php echo($product["name"]); ?></td>  
                <td><?php echo($product["color"]); ?></td>
                <td><?php echo(priceCampaign($product["price"])); ?> SEK</td>
                <td><input type="number" name="P_<?php echo ($index) ?>"></td>
                </tr>
                <?php } ?>
            </table>        

            <h2>Your personal information:</h2>

            Name: <input type="text" name="name" value="">
            <?php showError('missingname'); ?>
            <br><br> 
            Address: <input type="text" name="address" value="">
            <?php showError('missingaddress'); ?>
            <br><br>
            Phone number: <input type="text" name="phonenumber" value="">
            <?php showError('missingphonenumber'); ?>
            <br><br>
            E-mail: <input type="text" name="email" value="">
            <?php showError('missingemail'); ?>
            <br><br>


          <input type="submit" name="submit" value="Submit">  
        </form>
    </body>

</html>
