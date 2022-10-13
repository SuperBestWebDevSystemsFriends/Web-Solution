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
        <h1>User Cart</h1>
        <div class="progress">
            <span class="progressContainer">
                <p>Cart</p>
                <div class="progressBar active" id="progressBar1"></div>
            </span>
            <span class="progressContainer">
                <p>Shipping Details</p>
                <div class="progressBar" id="progressBar2"></div>
            </span>
            <span class="progressContainer">
                <p>Payment</p>
                <div class="progressBar" id="progressBar3"></div>
            </span>
            <span class="progressContainer">
                <p>Confirmation</p>
                <div class="progressBar" id="progressBar4"></div>
            </span>
        </div>
        <br>
    </div>

    <div class="cartItems">
        <h3>Your Items</h3>
        <?php
        require_once "dbconn.php";

        $sql = "SELECT name, i.item_id, quantity, username, price, i.image, description, (quantity*price) AS 'sum' FROM Cart c, Item i, user u WHERE c.item_id = i.item_id AND c.user_id = 2 AND u.user_id = i.seller";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class=\"items\">";
                echo "<div class='itemImage'><a class=\"productLink\" href=\"Product.php?id=" . $row["item_id"] . "\"><img src=\"data:image/jpeg;base64," . $row["image"] . "\"/></a></div>";
                echo "<div class='itemInfo'><a class=\"productLink\" href=\"Product.php?id=" . $row["item_id"] . "\"><h2 class='name'>" . $row["name"] . "</h2>";

                echo "<h3 class='price'> 
                                    <p class=\"quantity\">" . $row["quantity"] . " x </p> $"
                    . $row["price"]
                    . "</h3>";
                echo "<p class='desc'>" . $row["description"] . "</p>";
                echo "<label for=\"user_id\"></label>";
                echo "<input type=\"hidden\" id=\"userId\" name=\"userId\" value = \"" . $row["item_id"] . "\">";
                echo "<p class='user'>" . $row["username"] . "</p></a>";
                echo "<a class='button button2 checkoutButton' href='Product.php?id=" . $row["item_id"] . "'>View Item</a>";
                echo "<form class='checkoutForm' action=\"cart.php\" method=\"POST\"> 
                                        <label class='button2 checkoutButton' for='removeCart" . $row["item_id"] . "'> Remove From Cart </label>
                                        <input type=\"submit\" class='removeButtonHide' id = \"removeCart" . $row["item_id"] . "\" name=\"item\" value=\"" . $row["item_id"] . "\">
                                </form></div>";
                if ($_POST) {
                    $sqlDelete = "DELETE FROM cart WHERE user_id = 2 AND item_id =" . $_POST['item'] . ";";
                    $stmt = mysqli_prepare($conn, $sqlDelete);
                    mysqli_execute($stmt);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                echo "</div><br>";
            }
            mysqli_free_result($result);
        }

        ?>
    </div>
    <?php
    $sql = "SELECT SUM(price*quantity) AS 'Total' FROM Cart c, Item i WHERE c.item_id = i.item_id AND c.user_id = 2 GROUP BY user_id";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) == 0) {
            echo "<p> Your cart is empty. </p>";
            echo "        <form action = 'browse.php'>
                    <input class='button2' type='submit' value = 'Browse'/>
                    </form>";
        } else {
            $sumTotal = mysqli_fetch_assoc($result)['Total'];
            echo "<h2>Subtotal: $" . $sumTotal . "</h2> <p>Shipping calculated at next step</p>";
            echo "        <form action = 'shipping.php'>
                        <input class='button2' type='submit' value = 'Continue'/>
                        </form>";
        }
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>



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