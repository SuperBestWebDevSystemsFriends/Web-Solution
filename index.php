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
                <input class="tabButton active" type="submit" value="Home" />
            </form>
            <form class="tabContainer" action="selling.php">
                <input class="tabButton" type="submit" value="Sell" />
            </form>
            <form class="tabContainer" action="browse.php">
                <input class="tabButton" type="submit" value="Browse" />
            </form>
            <form class="tabContainer" action="cart.php">
                <input class="tabButton" type="submit" value="Cart" />
            </form>
        </div>
    </div>

    <div class="content">
        <h1>SENIOR</h1>
        <h3>Shopping and Exchange for (grey) Nomads Interested in Outdoor Recreation</h3>
        <form action="searchresults.php" method="POST">
            <input type="text" name="search" placeholder="Search.." />
            <button type="submit" class="button2 searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>



        <div class="featuredProducts">
            <h2>Featured Products</h2>
            <div class="products">
                <?php
                require_once "dbconn.php";

                $sql = "SELECT i.image, item_id, name, price, description, username FROM Item i, user u WHERE i.seller = u.user_id;";

                if ($result = mysqli_query($conn, $sql)) {
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class=\"items\">";
                            echo "<div class='itemImage'><a class=\"productLink\" href=\"Product.php?id=" . $row["item_id"] . "\"><img src=\"data:image/jpeg;base64," . $row["image"] . "\"/></a></div>";
                            echo "<div class='itemInfo'><a class=\"productLink\" href=\"Product.php?id=" . $row["item_id"] . "\"><h2 class='name'>" . $row["name"] . "</h2>";
                            echo "<h3 class='price'> $" . $row["price"] . "</h3>";
                            echo "<p class='desc'>" . $row["description"] . "</p>";
                            echo "<label for=\"user_id\"></label>";
                            echo "<input type=\"hidden\" id=\"userId\" name=\"userId\" value = \"" . $row["item_id"] . "\">";
                            echo "<p class='user'>" . $row["username"] . "</p></a>";
                            echo "<a class='button button2' href='Product.php?id=" . $row["item_id"] . "'>View Item</a></div>";
                            echo "</div><br>";
                            $i++;
                            if ($i == 3) {
                                break;
                            }
                        }
                    }
                    mysqli_free_result($result);
                } else {
                    echo "No results";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <div class="whitespace"></div>
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