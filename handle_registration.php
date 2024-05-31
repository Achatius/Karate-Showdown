<?php

require('connect.php');

// EllenĹ‘rizzĂĽk, hogy a felhasznĂˇlĂłnĂ©v foglalt-e
$check_username_query = $kapcsolat->prepare("SELECT COUNT(*) as count FROM felhasznalok WHERE felhasznalonev = :felhasznalonev");
$check_username_query->execute(['felhasznalonev' => $_POST["username"]]);
$result = $check_username_query->fetch(PDO::FETCH_ASSOC);

if ($result['count'] > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hibás felhasználónév vagy jelszó!</title>
        <style>
            * {
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            body, html {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background-color: #f0f0f0;
            }

            .form-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
                border-radius: 20px;
                background: linear-gradient(to bottom, #a0a0a0, #d0d0d0);
                width: 50%;
                max-width: 600px;
                min-width: 300px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .back-button {
                padding: 10px;
                border-radius: 5px;
                border: none;
                background-color: rgb(160, 160, 160);
                color: #fff;
                text-decoration: none;
                text-align: center;
                width: 100%;
                cursor: pointer;
                transition: background-color 0.3s;
                font-size: 16px;
            }

            .back-button:hover {
                background-color: #555;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <p>A felhasználónév már foglalt!</p>
        </div>
        <a class="back-button" href="registration.php">Vissza</a>
    </body>
    </html>
    <?php
    exit;
}

// Ha nem foglalt, akkor hajtsuk vĂ©gre a regisztrĂˇciĂłt
$insert_query = $kapcsolat->prepare("INSERT INTO felhasznalok (felhasznalonev, jelszo) VALUES (:felhasznalonev, :jelszo)");
$insert_query->execute([
    'felhasznalonev' => $_POST["username"],
    'jelszo' => md5($_POST["password"]),
]);

header("Location: login.php");
exit;
?>


