<?php
session_start();
if (!isset($_SESSION['playerScore'])) {
    $_SESSION['playerScore'] = 0;
}
if (!isset($_SESSION['enemyScore'])) {
    $_SESSION['enemyScore'] = 0;
}
?>
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
        }

        body, html {
            height: 100%;
            margin: 0;
            margin-top: 0px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: "Rubik Mono One", monospace;
        }

        .background-image {
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .Display {
            font-family: "Rubik Mono One", monospace;
            font-weight: 400;
            font-style: normal;
        }

        .description {
            position: absolute;
            top: -75px;
            right: 130px;
            width: 50%;
        }

        .restartbtn, .button {
            scale: 150%;
            border-radius: 20px;
            background-color: rgb(174, 125, 0);
            width: 10%;
            margin-top: 5px;
        }

        .button {
            background-color: gold;
            margin-top: 10px;
        }

        #playerScore, #enemyScore {
            color: white;
            text-align: center;
            font-size: 18px;
            margin-top: 5px;
        }

        @media screen and (max-width: 1024px) {
            body, html {
                scale: 70%;
            }
        }
        
        .health-bar {
            position: relative;
            height: 20px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
            background-color: rgb(63, 12, 1);
            border-radius: 20px;
        }

        .health {
            position: absolute;
            top: 0;
            bottom: 0;
            background: rgb(255, 42, 0);
            border-radius: 20px;
        }

        #enemyHealth {
            right: 0;
            left: auto;
            transform-origin: right;
        }

        .scoreboard {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }

    </style>
</head>
<body style="background-image: url(sprites/FireBackground.gif);" class="background-image">
<div style="position: relative; display: inline-block;">
    <div class="description">
        <img src="sprites/titles/Title2.png">
    </div>

  <div style="position: absolute; display: flex; width: 100%; align-items: center; padding: 20px;">
             <div style="position: relative; height: 20px; width: 100%; display: flex; justify-content: flex-end;">
                <div style="background-color:rgb(63, 12, 1); height: 20px; width: 100%; border-radius: 20px;"></div>
                <div id="playerHealth" style="position: absolute; background: rgb(255, 42, 0); top: 0; right: 0; bottom: 0; width: 100%; border-radius: 20px;"></div>
            </div>
             <div id="timer" style="background-color: crimson; height: 100px; width: 100px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; border-radius: 50px;">10</div> 
            <div style="position: relative; display: flex; height: 20px; width: 100%; display: flex; justify-content: flex-end;">
                <div style="background-color: rgb(63, 12, 1); height: 20px; width: 100%;  border-radius: 20px;"></div>
                <div id="enemyHealth" style="position: absolute; background: rgb(255, 42, 0); top: 0; left: 0; bottom: 0; width: 100%; border-radius: 20px;"></div>
            </div>
        </div> 
        
        <div id="displayText" style="position: absolute; color: white; display: flex; align-items: center; justify-content: center; top: 0; right: 0; bottom: 0; left: 0; display: none;" class="Display">Tie</div>
        <canvas></canvas>
    </div> 
<div class="scoreboard">
    <div id="playerScore">Player 1 Score: <?php echo $_SESSION['playerScore']; ?></div>
    <div id="enemyScore">Player 2 Score: <?php echo $_SESSION['enemyScore']; ?></div>
</div>
<div class="game.container">
    <script src="js/utils.js"></script>
    <script src="js/classes.js"></script>
    <script src="fighting.js"></script>
</div>

<audio id="music">
    <source src="sfx/Music.mp3" type="audio/mpeg">
</audio>

<script>
    const zeneElem = document.getElementById("music");

    document.addEventListener("keydown", (event) => {
        const billentyu = event.key;
        if (billentyu === " " || billentyu === "w" || billentyu === "a" || billentyu === "s" || billentyu === "d" || billentyu === "ArrowUp" || billentyu === "ArrowDown" || billentyu === "ArrowLeft" || billentyu === "ArrowRight") {
            zeneElem.play();
        }
    });

    function refreshPage() {
        location.reload();
    }

    function updatePlayerScore(score) {
        document.getElementById('playerScore').innerText = 'Player 1 Score: ' + score;
    }

    function updateEnemyScore(score) {
        document.getElementById('enemyScore').innerText = 'Player 2 Score: ' + score;
    }

    function updateEnemyHealth(percentage) {
        const enemyHealthBar = document.getElementById('enemyHealth');
        enemyHealthBar.style.transform = `scaleX(${percentage})`;
    }
</script>
<button class="restartbtn" onclick="refreshPage()">Új játék</button>
<button type="button" class="button"><a href="menu.php">Menű</a></button>
</body>
</html>


