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
                <div class="progressBar complete" id="progressBar1"></div>
            </span>
            <span class="progressContainer">
                <p>Shipping Details</p>
                <div class="progressBar active" id="progressBar2"></div>
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

    <form action="Checkout.php" method="POST">
        <input type="text" id="custName" name="fullName" placeholder="Full Name" pattern="\w+\s\w+" required>
        <input type="text" id="address" name="address" placeholder="Street Address" required>
        <input type="text" id="city" name="city" placeholder="City" required>
        <input type="text" id="state" name="state" placeholder="State" required>
        <input type="text" id="ZIP" name="zip" placeholder="Postal Code" pattern="\d{4}(?!\d)" required>
        <input type="text" id="phNumber" name="phNumber" placeholder="Phone number" pattern="^[0-9]*$" required>
        <br>
        <input class="button2" type="submit" value="Checkout" />
    </form>

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
<p style="display:none"> Bing Chandler </p>