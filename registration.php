<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
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
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        label, input {
            margin-bottom: 10px;
        }

        label {
            font-size: 16px;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        input[type="submit"], .back-button {
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

        input[type="submit"]:hover, .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="handle_registration.php" method="post">
            <label for="username">Felhasználónév:</label>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Jelszó:</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" value="Regisztrálás">
        </form>
        <a class="back-button" href="index.php">Vissza</a>
    </div>
</body>
</html>



