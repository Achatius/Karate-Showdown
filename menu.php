<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Showdown</title>
    <link rel="icon" type="image/x-icon" href="/sprites/titles/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet"> 
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Rubik Mono One', sans-serif;
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

        .button {
            background-color: rgb(160, 160, 160);
            padding: 10px 20px;
            margin: 10px;
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

        .button:hover {
            background-color: #555;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .background-image {
            background-size: cover;
            background-repeat: no-repeat;
        }

        @media screen and (max-width: 2560px) {
            body, html {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 1920px) {
            body, html {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 1440px) {
            body, html {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 1024px) {
            body, html {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 768px) {
            body, html {
                font-size: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            body, html {
                font-size: 8px;
            }

            .buttons-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <img src="sprites/titles/Intro.gif" id="Intro" class="center">
    <div class="buttons-container">
        <a href="game.php" class="button">Játssz</a>
        <a href="https://github.com/Achatius/Karate-Showdown.git" class="button">GitHub</a>
        <a href="buttons.php" class="button">Gombok</a>
        <a href="logout.php" class="button">Kijelentkezés</a>
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

