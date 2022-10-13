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
            <h1>Sell Item</h1>
        </div>
        <form action="sellingSubmitted.php" method="POST" enctype="multipart/form-data">
            <h2 class="selling">Item Information</h2>
            <h3> Item Name*</h3>
            <input type="text" name="itemName" required>

            <h3> Item Price* </h3>
            <p class="currencyInput">$ <input class="currencyInput" type="number" name="price" min="1" step="any" placeholder="00.00" required></p>

            <h3> Item Description* </h3>
            <input type="text" name="desc" size=100 required>

            <h3> Item Photo* </h3>
            <input type="file" name="image" accept="image/jpg, image/jpeg" required>
            <br><br>

            <h2 class="selling">Additional Information</h2>

            <h3> Item Condition (choose one)* </h3>
            <span class="groupOptions">
                <input class="radio" type="Radio" name="Condition" value="New" id="N">
                <label for="N" class="radioLabel">
                    New
                </label>
                <br>
                <input class="radio" type="Radio" name="Condition" value="Used" id="U">
                <label for="U" class="radioLabel">
                    Used
                </label>
                <br>
                <input class="radio" type="Radio" name="Condition" value="Love Needed" id="LN">
                <label for="LN" class="radioLabel">
                    Love Needed
                </label>
            </span>




            <h3> Item Category (choose any that apply, or none at all) </h3>
            <span class="groupOptions">
                <input class="check" type="checkbox" name="Camping" value=Camping id="Cam">
                <label for="Cam" class="checkLabel">
                    Camping
                </label>
                <br>
                <input class="check" type="checkbox" name="Caravaning" value=Caravaning id="Car">
                <label for="Car" class="checkLabel">
                    Caravaning
                </label>
                <br>
                <input class="check" type="checkbox" name="Hiking" value=Hiking id="H">
                <label for="H" class="checkLabel">
                    Hiking
                </label>
            </span>
            <br><br>
            <div>
                <input type="submit" value="Add to Marketplace">
            </div>
        </form>






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