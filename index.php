<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Showdown</title>
    <link rel="icon" type="image/x-icon" href="/sprites/titles/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            background-image: url('sprites/titles/Background.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .button, .button2 {
            padding: 10px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            margin: 0 10px;
            border: none;
        }

        .button:hover, .button2:hover {
            background-color: rgba(200, 200, 200, 0.8);
        }

        @media screen and (max-width: 1024px) {
            .button, .button2 {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <img src="sprites/titles/Intro.gif" id="Intro" class="center">
    <div class="buttons-container">
        <button type="button" class="button"><a href="login.php">Bejelentkezés</a></button>
        <button type="button" class="button2"><a href="registration.php">Regisztráció</a></button>
        <button type="button" class="button"><a href="scoreboard.php">Eredménytábla</a></button> <!-- Új gomb hozzáadása -->
    </div>
    <script>
        var kep = document.getElementById("Intro");
        kep.onload = function() {
            kep.addEventListener("animationend", function() {
                kep.style.animationPlayState = "paused";
            });
        };
    </script>
</body>
</html>
