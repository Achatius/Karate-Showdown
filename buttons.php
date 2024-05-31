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
            background-image: url('sprites/titles/InvertBackground.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .button {
            border-radius: 20px;
            background-color: rgb(160, 160, 160);
            padding: 10px 20px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #555;
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
        }
    </style>
</head>
<body>
    <img src="sprites/titles/Buttons.png" id="Intro" class="center">
    <a href="menu.php" class="button">Vissza</a>
</body>
</html>
