<?php
    // Toppings
    $pepperoni = $_POST['pepperoni'];
    $mushroom = $_POST['mushroom'];
    
    // Customer Info
    if(isset($_POST['nameText']) && isset($_POST['cardNum'])) {
        $customerName = $_POST['nameText'];
        $cardNumber = $_POST['cardNum'];
    }
    
    $orderMsg = "Your Order";
    
    if(isset($_POST['requestsText']))
        $specialRequest = $_POST['requestsText'];
    
    if($pepperoni== "pepperoni" && $mushroom == "mushroom") {
        $price = "$" . "6.50";
        $typeOfPizza = "Pepperoni & Mushroom";
        $showPizza = "<img id='topping' src='./img/both.png'>";
    } else if($pepperoni== "pepperoni") {
        $price = "$" . "5.50";
        $typeOfPizza = "Pepperoni";
        $showPizza = "<img id='topping' src='./img/pepperoni.png'>";
    } else if($mushroom == "mushroom") {
        $price = "$" . "5.50";
        $typeOfPizza = "Mushroom";
        $showPizza = "<img id='topping' src='./img/mushroom.png'>";
    } else {
        $price = "$" . "5.00";
        $typeOfPizza = "No Toppings";
        $showPizza = "<img id='topping' src='./img/normalPizza.png'>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Heat's Pizza</title>
        
        <style>
            @import url(css/styles.css);
        </style>
    </head>
    
    <body>
        <h1 id='title' align=center>Heat's Pizza <img id='fire' src='./img/fire.png'></h1>
        <!-- Forms -->
        <!--     -> Pizza Toppings   (Checkboxes) -->
        <form action='index.php' method='post'>
            <fieldset>
                <legend>Select your pizza toppings:</legend>
                    <!-- |Pepperoni| -->
                    <input type='checkbox' name='pepperoni' id='pep' value='pepperoni' <?php if(isset($_POST['pepperoni'])) echo "checked='checked'"; ?> >
                    <label id='labelPep' for='pep'>Pepperoni</label>
                    <br/>
                    <!-- |Mushroom| -->
                    <input type='checkbox' name='mushroom' id='mush' value='mushroom' <?php if(isset($_POST['mushroom'])) echo "checked='checked'"; ?> >
                    <label id='labelMush' for='mush'>Mushroom</label>
                    <br/>
                    <!-- |No Toppings| -->
                    <input type='checkbox' name='noTopping' id='noTop' <?php if(isset($_POST['noTopping'])) echo "checked='checked'"; ?> >
                    <label id='labelNoTop' for='noTop'>No Toppings</label>
                    <br/>
            </fieldset>
            <br/>
            
            <!--     -> Special Requests (Text Area) -->
            <label id='getRequest' for='requests'>Let us know if you have any special request on your way to pick up.</label><br/>
            <textarea 
                id='requests' 
                name='requestsText' 
                placeholder='Birthday, Gift, Special Occasion, etc.' 
                value="<?=$_GET['requestsText']?>">
                <?php if(isset($_POST['requestsText'])) echo $_POST['requestsText']; ?> 
            </textarea>
            <br/>
            
            <!--     -> Entering Name    (Text Input) -->
            <br/>
            <label id='labelName' for='name'>Name:</label>
            <input id='name' type='text' name='nameText' placeholder='First Last' value="<?php if(isset($_POST['nameText'])) echo $_POST['nameText']; ?> ">
            
            <br/><br/>
            <label id='labelCard' for='card'>Card #:</label>
            <input id='card' type='text' name='cardNum' placeholder='#### #### #### ####' value="<?php if(isset($_POST['cardNum'])) echo $_POST['cardNum']; ?> ">
            <br/><br/><br/>
            
            <!--     -> Submit Order     (Submit Button) -->
            <input id='submitButton' type='submit' name='justSubmitted' value='Order for Pick-up'>
        </form>
        
        <?php
            // If Customer Entered their name
            //  - Otherwise, show that they forgot to enter their name
            if(($customerName != "") && ($cardNumber != "")) {
                echo "<h1 id='orderMsg'>" . $orderMsg . " <img id='order' src='./img/order.png'></h1>";
                echo $showPizza . "<br/>";
                
                echo "<fieldset id='orderInfo'>";
                echo "<h4>Order Info</h4>";
                echo "   Type: " . $typeOfPizza . "<br/>";
                echo "  Price: " . $price . "<br/>";
                echo "Order #: " . rand(1, 100) . "<br/><br/>";
                
                echo "<h4>Contact Info</h4>";
                echo "  Name: " . $customerName . "<br/>";
                echo "Card #: " . $cardNumber . "<br/>";
                
                if(($specialRequest != "")) {
                    echo "Special Request: ";
                    echo $specialRequest;
                    echo "<br/>";
                }
                echo "<br/><br/>";
                echo "<img id='barcode' src='./img/barcode.png'>";
                echo "<br/>";
                
                echo "<br/>";
                echo "Please come for pick up in 15 min at the location below in Marina.";
                echo "<br/>";
                echo "<br/>";
                echo "<img id='location' src='./img/heatsPizza.png'>";
                echo "<br/>";
                echo "<br/>";
                
                echo "</fieldset>";
            } else if(isset($_POST['justSubmitted'])) {
                echo "<h1 id='error' align='center'>Error. Name and card number have not been entered. <img id='shockedEmoji' src='./img/shocked.png'></h1>";
            }
        ?>
    </body>
</html>