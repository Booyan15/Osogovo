<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'osogovoporacki@gmail.com';
    $mail->Password = 'qnshdlgsyjxqfeim';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('osogovoporacki@gmail.com');
    $mail->addAddress("osogovoporacki@gmail.com");
    $mail->isHTML(true);
    $mail->Subject = "Poracka od: " . $_POST["name"];
    
    $email = $_POST["email"];
    $name = $_POST["name"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $cart = isset($_POST["cart"]) ? $_POST["cart"] : 'No cart data'; // Cart data received as JSON string

    // Decode the cart JSON for better formatting in the email
    $cartDecoded = json_decode($cart, true);
    $cartItems = '';
    if ($cartDecoded) {
        foreach ($cartDecoded as $item) {
            $cartItems .= "<p>Продукти: {$item['name']}<br>Цена: {$item['price']} денари<br>Броја: {$item['quantity']}<br>Тотал: " . ($item['price'] * $item['quantity']) . " денари </p>" ;
        }
    }

    $mail->Body = "
        Име: $name <br>
        E-mail: $email <br>
        Град: $city, <br>
        Телефонски број: $phone <br>
        <BR><BR>
        ПОРАЧКАТА Е СЛЕДНАТА <br>$cartItems
    ";

    try {
        $mail->send();
        echo "
        <script>
        alert('Успешно порачано');
        document.location.href='cart.php'; // Redirect to cart page
        </script>
        ";
    } catch (Exception $e) {
        echo "
        <script>
        alert('Грешка при порачката: {$mail->ErrorInfo}');
        document.location.href='cart.php';
        </script>
        ";
    }
}
?>
