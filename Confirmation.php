<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/0c7165f7a1.js" crossorigin="anonymous"></script>
        <script src="scripts/modeManager.js" defer></script>
    </head>
    <body style="transition: 0s !important">
        <div class="tab" id="header">
            <div class="tabSpacer">
                <form class="tabContainer" action = "index.php">
                    <input class="tabButton" type="submit" value = "Home"/>
                </form>
                <form class="tabContainer" action = "selling.php">
                    <input class="tabButton" type="submit" value = "Sell"/>
                </form>
                <form class="tabContainer" action = "browse.php">
                    <input class="tabButton" type="submit" value = "Browse"/>
                </form>
                <form class="tabContainer" action = "cart.php">
                    <input class="tabButton active" type="submit" value = "Cart"/>
                </form>
            </div>
        </div>

        <div class="content">
            <h1>Checkout</h1>

            <div class = "progress">
                <span class = "progressContainer">
                    <p>Cart</p>
                    <div class= "progressBar complete" id = "progressBar1"></div>
                </span>
                <span class = "progressContainer">
                    <p>Shipping Details</p>
                    <div class= "progressBar complete" id = "progressBar2"></div>
                </span>
                <span class = "progressContainer">
                    <p>Payment</p>
                    <div class= "progressBar complete" id = "progressBar3"></div>
                </span>
                <span class = "progressContainer">
                    <p>Confirmation</p>
                    <div class= "progressBar active" id = "progressBar4"></div>
                </span>
            </div>
            <br>

            <!-- <?php
                
         
                // $sql = "SELECT name, quantity, price, image, description, (quantity*price) AS 'sum' FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 1";
                // $sqlTotal = "SELECT SUM(price*quantity) AS 'Total', item_id FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 1 GROUP BY user_id";
                
                // if($result = mysqli_query($conn, $sql)){
                //     while($row = mysqli_fetch_assoc($result)){
                //         echo "<p class=\"summaryItems\">" . $row["quantity"] . "x " . $row["name"] . " $" . $row["sum"] . "</p>";
                //     }
                //     mysqli_free_result($result);
                // }

                // if($resultTotal = mysqli_query($conn, $sqlTotal)){
                //     if(mysqli_num_rows($resultTotal) == 0){
                //         echo "<p> Your cart is empty. </p>";
                //     }
                //     else{
                //         $sumTotal = mysqli_fetch_assoc($resultTotal)["Total"] + 15.99;
                //         echo "<p class=\"summaryTotal\" id=\"shipping\"> Shipping $15.99</p>";
                //         echo "<p class=\"summaryTotal\" id=\"Total\"> Total $". $sumTotal ."</p>";
                //     }
                //     mysqli_free_result($resultTotal);
                // }
            ?> -->

        <!-- </div>
                <?php 

                // $sql = "SELECT SUM(price*quantity) AS 'Total' FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 1 GROUP BY user_id";
                // if($result = mysqli_query($conn, $sql)){
                //     if(mysqli_num_rows($result) == 0){
                //         echo "<p> Your cart is empty. </p>";
                //     }
                //     else{
                //         $sumTotal = mysqli_fetch_assoc($result)['Total'] + 15.99;
                //         echo "<input type=\"button\" onlick=\"hidePayment()\" class = \"button2\" id=\"placeOrder\" value=\"Place Order for $". $sumTotal ."\">";
                //     }
                //     mysqli_free_result($result);
                // }
                ?> 
            </div>
        </div> -->

    
        
        <div class="confirmation" id="confirmation">
            <i class="fa-solid fa-circle-check" id="confirmationTick"></i>
            <h2>Confirmation</h2>
            <h3>Congratulations! Your order has been placed.</h3>
                <?php
                    require_once "dbconn.php";

                    $sql = "SELECT name, i.item_id, quantity, username, price, i.image, description, (quantity*price) AS 'sum' FROM Cart c, Item i, user u WHERE c.item_id = i.item_id AND c.user_id = 1 AND u.user_id = i.seller";

                    $fullName = explode(' ', $_POST['fullName']);
                    $firstName = $fullName[0];
                    $lastName = $fullName[1];
                    $firstCardName = explode(' ', $_POST['cardName']);
                    
                    if($result = mysqli_query($conn, $sql)){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class=\"items\">";
                            echo "<div class='itemImage'><a class=\"productLink\" href=\"Product.php?id=". $row["item_id"]."\"><img src=\"data:image/jpeg;base64,".$row["image"]."\"/></a></div>";
                            echo "<div class='itemInfo'><a class=\"productLink\" href=\"Product.php?id=". $row["item_id"]."\"><h2 class='name'>" . $row["name"] . "</h2>";

                            echo "<h3 class='price'> 
                                    <p class=\"quantity\">" . $row["quantity"] . " x </p> $"
                                    . $row["price"] 
                                    . "</h3>";
                            echo "<p class='desc'>" . $row["description"] . "</p>";
                            echo "<label for=\"user_id\"></label>";
                            echo "<input type=\"hidden\" id=\"userId\" name=\"userId\" value = \"" . $row["item_id"] . "\">";
                            echo "<p class='user'>" . $row["username"] . "</p></a>";
                            echo "<a class='button button2' href='Product.php?id=". $row["item_id"]."'>View Item</a></div>";
                            echo "</div><br>";

                            // Add to PO

                            $sqlPO = "INSERT INTO PurchaseOrder (user_id, item_id, quantity, card_number, cvv, expiration, card_holder_name, street_address, city, state, post_code, phone_number) 
                                VALUES (2," . $row["item_id"] . "," . $row["quantity"] . "," . $_POST["cardNumber"] . "," . $_POST["cvv"] . "," . $_POST["expDate"] . ",'" . $_POST['cardName'] . "','" . $_POST["address"] . "','" . $_POST["city"] . "','" . $_POST["state"] . "'," . $_POST["zip"] . "," . $_POST["phNumber"] . ");";
                            $stmt = mysqli_prepare($conn, $sqlPO);
                            echo mysqli_error($conn);
                            $stmt = mysqli_execute($stmt);
                        }
                        mysqli_free_result($result);
                    }
                    $sqlDelete ="DELETE FROM Cart WHERE user_id = 1";
                    mysqli_query($conn, $sqlDelete);
                    mysqli_close($conn);
                ?>
        </div>

        <div class="whitespace">

        </div>

        <div class="qactionWrapper">
            <div class="tab qaction" id="quickaction">
                <div class="tabSpacer container">
                    <button class="tablinks" id="helpToggle" onclick="toggleHelp()">
                        <i class="fa-solid fa-circle-question"></i> Help
                    </button>
                    <div class="helpWindow" id="help">
                        <h2>Contact Helpline</h2>
                        <p><i class="fa-solid fa-phone"> </i>  <a href="mailto:helpdesk@senior.com"><u>helpdesk@senior.com</u></a></p>
                        <p><i class="fa-solid fa-envelope"> </i>  <a href=""><u>1300-1234</u></a></p>
                    </div>
                    <button class="tablinks" onclick="fontDecrease()" id="fontDecrease">
                        <i class="fa-solid fa-minus"></i> <i class="fa-solid fa-text-height"></i> Font Size
                    </button>
                    <button class="tablinks" onclick="fontIncrease()" id="fontIncrease"> 
                        <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-text-height"></i> Font Size
                    </button>
                    <button class="tablinks" onclick="toggleMode()" id="modeToggle">
                        Light/Dark Mode
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
