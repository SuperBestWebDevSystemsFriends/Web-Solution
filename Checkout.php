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
            <form class="tabContainer" action="index.php">
                <input class="tabButton" type="submit" value="Home" />
            </form>
            <form class="tabContainer" action="selling.php">
                <input class="tabButton" type="submit" value="Sell" />
            </form>
            <form class="tabContainer" action="browse.php">
                <input class="tabButton" type="submit" value="Browse" />
            </form>
            <form class="tabContainer" action="cart.php">
                <input class="tabButton active" type="submit" value="Cart" />
            </form>
        </div>
    </div>

    <div class="content">
        <h1>Checkout</h1>

        <div class="progress">
            <span class="progressContainer">
                <p>Cart</p>
                <div class="progressBar complete" id="progressBar1"></div>
            </span>
            <span class="progressContainer">
                <p>Shipping Details</p>
                <div class="progressBar complete" id="progressBar2"></div>
            </span>
            <span class="progressContainer">
                <p>Payment</p>
                <div class="progressBar active" id="progressBar3"></div>
            </span>
            <span class="progressContainer">
                <p>Confirmation</p>
                <div class="progressBar" id="progressBar4"></div>
            </span>
        </div>
        <br>

        <div class="payment" id="payment">
            <form action='Confirmation.php' method="POST" name="cardForm" id="cardForm">
                <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$" value="5555555555554444" required>
                <br>
                <span>
                    <input type="text" id="cvv" name="cvv" placeholder="CVV" pattern="\d{3}(?!\d)" required>
                    <input type="text" id="expDate" name="expDate" placeholder="Expiration Date (MM/YY)" patttern="^(1[0-2]|0[1-9]|\d)\/(20\d{2}|19\d{2}|0(?!0)\d|[1-9]\d)$" required>
                </span>
                <br>
                <input type="text" id="cardName" name="cardName" placeholder="Cardholder Name" pattern="\w+\s\w+" required>
                <br>
                <div class="Summary">
                    <h4>ORDER SUMMARY</h4>
                    <?php
                    require_once "dbconn.php";
                    $sql = "SELECT name, quantity, price, image, description, (quantity*price) AS 'sum' FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 2";
                    $sqlTotal = "SELECT SUM(price*quantity) AS 'Total', item_id FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 2 GROUP BY user_id";
                    // Hidden shipping details
                    echo "
                    <div class=\"hiddenShipping\">
                    <input type=\"text\" id=\"custName\" name=\"fullName\" placeholder=\"Full Name\" value=\"" . $_POST["fullName"] . "\" required>
                    <input type=\"text\" id=\"address\" name=\"address\" placeholder=\"Street Address\" value=\"" . $_POST["address"] . "\" required>
                    <input type=\"text\" id=\"city\" name=\"city\" placeholder=\"City\" value=\"" . $_POST["city"] . "\" required>
                    <input type=\"text\" id=\"state\" name=\"state\" placeholder=\"State\" value=\"" . $_POST["state"] . "\" required>
                    <input type=\"text\" id=\"ZIP\" name=\"zip\" placeholder=\"Postal Code\" value=\"" . $_POST["zip"] . "\" required>
                    <input type=\"text\" id=\"phNumber\" name=\"phNumber\" placeholder=\"Phone number\" value=\"" . $_POST["phNumber"] . "\" required>
                    </div>
                    ";
                    if ($result = mysqli_query($conn, $sql)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<p class=\"summaryItems\">" . $row["quantity"] . "x " . $row["name"] . " $" . $row["sum"] . "</p>";
                        }
                        mysqli_free_result($result);
                    }
                    if ($resultTotal = mysqli_query($conn, $sqlTotal)) {
                        if (mysqli_num_rows($resultTotal) == 0) {
                            echo "<p> Your cart is empty. </p>";
                        } else {
                            $sumTotal = mysqli_fetch_assoc($resultTotal)["Total"] + 15.99;
                            echo "<p class=\"summaryTotal\" id=\"Total\"> Total $" . $sumTotal . "</p>";
                        }
                        mysqli_free_result($resultTotal);
                    }
                    ?>
                </div>
                <?php
                $sql = "SELECT SUM(price*quantity) AS 'Total' FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 2 GROUP BY user_id";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) == 0) {
                        echo "<p> Your cart is empty. </p>";
                    } else {
                        $sumTotal = mysqli_fetch_assoc($result)['Total'] + 15.99;
                        echo "<p class=\"summaryTotal\" id=\"shipping\"> Shipping $15.99</p>";
                        echo "<input type=\"submit\" class = \"button2\" id=\"placeOrder\" value=\"Place Order for $" . $sumTotal . "\"></form>";
                    }
                    mysqli_free_result($result);
                }
                mysqli_close($conn);
                ?>
        </div>
    </div>

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
                    <p><i class="fa-solid fa-phone"> </i> <a href="mailto:helpdesk@senior.com"><u>helpdesk@senior.com</u></a></p>
                    <p><i class="fa-solid fa-envelope"> </i> <a href=""><u>1300-1234</u></a></p>
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