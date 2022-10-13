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
        <h1>Search Results</h1>

        <?php
        require_once "dbconn.php";


        $search = $_POST['search'];

        echo "            <form action='searchresults.php' method='POST'>
            <input type='text' name='search' placeholder='Search..' value=" . $search . ">
            <button type='submit' class='button2 searchButton'><i class='fa-solid fa-magnifying-glass'></i></button>
                </form>";

        $min_length = 1;

        $sql = "SELECT item_id, i.image, i.name, price, username, description FROM Item i, user u WHERE i.seller = u.user_id AND name LIKE '%" . $search . "%'";

        if (strlen($search) >= $min_length) {
            $search = htmlspecialchars($search);
            $search = mysqli_real_escape_string($conn, $search);
            $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($results) > 0) {
                if (mysqli_num_rows($results) == 1)
                    echo "<p>" . mysqli_num_rows($results) . " Result for search term \"" . $search . "\".</p>";
                else
                    echo "<p>" . mysqli_num_rows($results) . " Results for search term \"" . $search . "\".</p>";
                while ($refined_result = mysqli_fetch_array($results)) {
                    echo "<div class=\"items\">";
                    echo "<div class='itemImage'><a class=\"productLink\" href=\"Product.php?id=" . $refined_result["item_id"] . "\"><img src=\"data:image/jpeg;base64," . $refined_result["image"] . "\"/></a></div>";
                    echo "<div class='itemInfo'><a class=\"productLink\" href=\"Product.php?id=" . $refined_result["item_id"] . "\"><h2 class='name'>" . $refined_result["name"] . "</h2>";
                    echo "<h3 class='price'> $" . $refined_result["price"] . "</h3>";
                    echo "<p class='desc'>" . $refined_result["description"] . "</p>";
                    echo "<label for=\"user_id\"></label>";
                    echo "<input type=\"hidden\" id=\"userId\" name=\"userId\" value = \"" . $refined_result["item_id"] . "\">";
                    echo "<p class='user'>" . $refined_result["username"] . "</p></a>";
                    echo "<a class='button button2' href='Product.php?id=" . $refined_result["item_id"] . "'>View Item</a></div>";
                    echo "</div><br>";
                }
            } else {
                echo "No results for search term \"" . $search . "\".";
            }
        } else {
            echo "Minimum length of search is " . $min_length;
        }
        mysqli_close($conn);

        ?>
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