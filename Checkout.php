<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="tab" id="header">
        <div class="tabSpacer">
                <form action = "index.php">
                    <input class="tabButton" type="submit" value = "Home"/>
                </form>
                <form action = "selling.php">
                    <input class="tabButton" type="submit" value = "Sell"/>
                </form>
                <form action = "browse.php">
                    <input class="tabButton" type="submit" value = "Browse"/>
                </form>
                <form action = "cart.php">
                    <input class="tabButton active" type="submit" value = "Cart"/>
                </form>
            </div>
        </div>


        <div class="content">
            <h1>Checkout Page</h1>
            <h2>The place for Old Dogs to buy outdoor shit</h2>
            <form>
                <input type="text" placeholder="Search..">
                <button type="submit">Search</button>
            </form>
            <div class="fproducts">
                <h2>Featured Products</h2>
                <div class="product">
                    <img src="https://m.media-amazon.com/images/I/6161+3txTxL.jpg" alt="Dog Bed">
                    <h3>Dog Bed</h3>
                    <p>$50</p>
                    <p>Some text about the dog bed.</p>
                </div>
            </div>
        </div>

        <div class="tab qaction" id="quickaction">
            <div class="tabSpacer" id="header">
                <button class="tablinks" href="">Quick Action 1</button>
                <button class="tablinks" href="">Quick Action 2</button>
                <button class="tablinks" href="">Quick Action 3</button>
                <button class="tablinks" href="">Quick Action 4</button>
            </div>
        </div>
        <?php
            // echo '<img src="data:image/jpeg;base64,'.'
            // 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
            // '.'"/>';
        ?>
    </body>
</html>