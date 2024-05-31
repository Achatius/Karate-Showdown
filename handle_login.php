<?php
session_start();

require('connect.php');

$stmt = $kapcsolat->prepare("SELECT id, felhasznalonev FROM felhasznalok WHERE felhasznalonev = :username AND jelszo = :password");
$stmt->execute([
    "username" => $_POST["username"],
    "password" => md5($_POST["password"])
]);

$user = $stmt->fetchAll();

if (!empty($user)) {
    $_SESSION["id"] = $user[0]["id"];
    $_SESSION["username"] = $user[0]["felhasznalonev"];
    header("Location: menu.php");
    exit;
} else {
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
            <p>Hibás felhasználónév vagy jelszó!</p>
        </div>
        <a class="back-button" href="login.php">Vissza</a>
    </body>
    </html>
    <?php
}
?>


