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
                <input class="tabButton active" type="submit" value="Sell" />
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
        <div>
            <h1>Item Placed on Marketplace</h1>
        </div>

        <?php
        require_once "dbconn.php";

        $itemName = $_POST['itemName'];
        $itemPrice = $_POST['price'];
        $itemDesc = $_POST['desc'];
        $condition = $_POST['Condition'];
        $category = 0;
        isset($_POST['Camping']) ? $category += 4 : null;
        isset($_POST['Caravaning']) ? $category += 2 : null;
        isset($_POST['Hiking']) ? $category += 1 : null;
        $itemImage = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
        $itemSeller = 2;

        $sql = "INSERT INTO Item (name, description, seller, price, image, item_condition, category) VALUES ('$itemName', '$itemDesc', '$itemSeller', $itemPrice, '$itemImage', '$condition', $category)";

        if (mysqli_query($conn, $sql)) {
            echo "<h3> Item Successfully Added to Marketplace </h3>";
        } else {
            echo "ERROR: Something Went Wrong";
            mysqli_error($conn);
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