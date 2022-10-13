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
                <input class="tabButton active" type="submit" value="Browse" />
            </form>
            <form class="tabContainer" action="cart.php">
                <input class="tabButton" type="submit" value="Cart" />
            </form>
        </div>
    </div>


    <div class="content">
        <div class="product">
            <?php
            require_once "dbconn.php";

            $uri = $_SERVER['REQUEST_URI'];
            $components = parse_url($uri);
            parse_str($components["query"], $params);
            $id = $params["id"];
            $sql = "SELECT i.image AS itemImage, name, seller, price, description, u.image AS userImage, user_id, username, email, phone FROM Item i, User u WHERE item_id = $id AND i.seller = u.user_id";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<h1 class='name'>" . $row["name"] . "</h1>";
                    echo "<div class=\"items\">";
                    echo "<div class='fullImage'><img src=\"data:image/jpeg;base64," . $row["itemImage"] . "\"/></div>";
                    echo "<div class=\"itemSeller\">";
                    echo "<h3> Seller: </h3>";
                    echo "<img id=\"userImg\" src=\"data:image/jpeg;base64," . $row["userImage"] . "\"/>";
                    echo "<p id=\"sellerUsername\">" . $row["username"];
                    echo "<a href='mailto:" . $row["email"] . "'><p id=\"sellerEmail\">" . $row["email"] . "</a>";
                    echo "<p id=\"sellerPhone\">" . $row["phone"];
                    echo "</div>";
                    echo "<div class='itemInfo'>";
                    echo "<h3 class='price'> $" . $row["price"] . "</h3>";
                    echo "<p class='desc'>" . $row["description"] . "</p>";
                    echo "</div>";
                    echo "</div><br>";
                    if ($row['seller'] != 2)
                        echo "<form action=\"\" method=\"POST\">
                                    <span class='quantityContainer'> 
                                    <p>Quantity  <input class='quantity' type=\"number\" name=\"quantity\" min=\"1\" step=\"1\" value='1' required>
                                    </p> <input type=\"submit\" value=\"Add to Cart\">
                                    </span> 
                                </form>";
                } else {
                    echo "<h1>Oops! This product does not exist.</h1>";
                    echo "        <form action = 'index.php'>
                    <input class='button2' type='submit' value = 'Go Home'/>
                    </form>";
                }
                mysqli_free_result($result);
            } else {
                echo "No results";
            }

            ?>

            <?php
            if ($_POST) {
                $user_id = 2;
                $uri = $_SERVER['REQUEST_URI'];
                $components = parse_url($uri);
                parse_str($components["query"], $params);
                $id = $params["id"];
                $quantity = $_POST['quantity'];

                $sqlCart = "SELECT item_id, quantity FROM cart WHERE item_id = $id;";

                $sqlDelete = "DELETE FROM cart WHERE item_id = $id;";
                $stmt = mysqli_prepare($conn, $sqlDelete);

                if ($result = mysqli_query($conn, $sqlCart)) { //check if item exists already in cart
                    $row = mysqli_fetch_assoc($result);
                    if (isset($row['quantity'])) $quantity += $row['quantity'];
                    mysqli_execute($stmt);
                    //add new quantity to existing quantity
                } // item doesn't exist in cart, therefore use normal SQL statement

                $sql = "INSERT INTO Cart (user_id, item_id, quantity) VALUES ('$user_id', '$id', '$quantity')";


                if (mysqli_query($conn, $sql)) {
                    echo "<h3> Item Successfully Added to Cart </h3>";
                } else {
                    echo "ERROR: Something Went Wrong";
                    mysqli_error($conn);
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <div class="whitespace"></div>

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