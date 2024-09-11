<?php

$nameErr = $lastNameErr = $emailErr = $messageErr = "";
$name = $lastName = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Внеси име";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]{1,20}$/", $name)) {
            $nameErr = "Дозволени се само букви и празно место";
        }
    }

    if (empty($_POST["lastName"])) {
        $lastNameErr = "Внеси презиме";
    } else {
        $lastName = test_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastName)) {
            $lastNameErr = "Дозволени се само букви и празно место";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Внеси емаил";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Невалиден емаил";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Внеси порака";
    } else {
        $message = test_input($_POST["message"]);
    }

    if (empty($nameErr) && empty($lastNameErr) && empty($emailErr) && empty($messageErr)) {
        $subject = "New Contact Form Submission";
        $headers = "From: $email\r\n";

        $mailBody = "Name: $name $lastName\n";
        $mailBody .= "Email: $email\n";
        $mailBody .= "Message:\n$message";
    
    

        if (mail($to, $subject, $mailBody, $headers)) {
            echo "<p style='color: green;'>Благодарам за контактирањето. Вашата порака е испратена.</p>";
        } else {
            echo "<p style='color: red;'>Грешка во испраќањето. Обидете се повторно.</p>";
        }
    	$name = $lastName = $email = $message = "";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



