<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФАН ШОП</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Company Logo" class="logo">
        <a href="cart.php" class="cart-link">Кошнича: <span id="cart-count">0</span> продукти</a>
    </header>
<br><br>
    <main>
        <div class="product-container">
            <div class="product" data-name="ШАЛ" data-price="600" data-image="ШАЛ">
                <img src="img/shalovi.jpg" alt="ШАЛ" class="product-image">
                <h2>ШАЛ</h2>
                <p>Цнеа: 600мкд</p>
                <button onclick="addToCart(this)">Додади во кошница</button>
            </div>

            <div class="product" data-name="Дрес жолт" data-price="1500" data-image="жолт">
                <img src="img/dreszolt.jpg" alt="ДРЕС ЖОЛТ" class="product-image">
                <h2>Дрес жолт</h2>
                <p>Цена: 1500 мкд</p>
                <button onclick="addToCart(this)">Додади во кошница</button>
            </div>

            <div class="product" data-name="Сезонски билет" data-price="1000" data-image="билет">
                <img src="img/sezonska.jpg" alt="СЕЗОНСКИ БИЛЕТ" class="product-image">
                <h2>Сезонски билет</h2>
                <p>Цена: 1000 мкд</p>
                <button onclick="addToCart(this)">Додади во кошница</button>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
    <br><br><br>

    <footer>
        <div class="footer-content">
            <p>Изработено од <a href="https://www.instagram.com/popovski_15/" target="_blank">Бојан Поповски</a> &copy; 2024</p>
        </div>
    </footer>
</body>
</html>