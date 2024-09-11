<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кошничка</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Кошничка</h1>
        <a href="index.php" class="back-link">Назад кон продавницата</a>
    </header>

    <main>
        <div class="cart-container">
            <div class="cart-items" id="cart-items">
                <!-- Cart items will be populated here by JavaScript -->
            </div>
            <div class="cart-summary" id="cart-summary">
                <!-- Cart summary will be displayed here -->
            </div>
        </div>
    </main>

    <div id="popupForm" class="popup">
        <form action="submit.php" method="POST" class="popup-content">
            <span class="close"></span>
            <h2>ИНФОРМАЦИИ ЗА ПОРАЧКАТА</h2>
            <?php include "formValidation.php" ?>    
            <label for="name">Име и презиме:</label><br>
            <input type="text" id="name" name='name' required><br><br>

            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="city">Град:</label><br>
            <input type="text" id="city" name='city' required><br><br>

            <label for="phone">Телефонски број:</label><br>
            <input type="text" id="phone" name='phone' required><br><br>

            <input type="submit" class="buy-btn" value="Порачај" name="send">
            <?php if (!empty($message1)) { ?>
                <strong><?php echo $message1; ?></strong>
            <?php } ?>
        </form>
    </div>


    <script src="cart.js"></script>
</body>
</html>
