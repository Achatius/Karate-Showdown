<?php
session_start();
include 'connect.php';

// Beérkező JSON adatok dekódolása
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizzük, hogy a szükséges adatok megérkeztek-e
    if ($data && isset($data['playerScore']) && isset($data['enemyScore']) && isset($_SESSION['username'])) {
        $playerScore = $data['playerScore'];
        $enemyScore = $data['enemyScore'];
        $username = $_SESSION['username'];
        
        try {
            // Frissíti a pontokat az adatbázisban az aktuális felhasználóhoz
            $stmt = $kapcsolat->prepare("UPDATE felhasznalok SET player1_score = :playerScore, player2_score = :enemyScore WHERE felhasznalonev = :username");
            $stmt->bindParam(':playerScore', $playerScore, PDO::PARAM_INT);
            $stmt->bindParam(':enemyScore', $enemyScore, PDO::PARAM_INT);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            
            // Sikeres válasz küldése
            http_response_code(200);
            echo json_encode(["message" => "Sikeres frissítés"]);
        } catch (PDOException $e) {
            // Hibakezelés
            echo json_encode(["error" => "Hiba történt a pontok frissítése közben: " . $e->getMessage()]);
            http_response_code(500);
        }
    } else {
        // Hibaüzenet, ha nem érkezett megfelelő adat
        echo json_encode(["error" => "Hiányzó vagy érvénytelen adat"]);
        http_response_code(400);
    }
}

// Táblázat megjelenítése
try {
    // Lekérdezi a felhasználók pontjait az adatbázisból
    $stmt = $kapcsolat->query("SELECT * FROM felhasznalok");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
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
            width: 70%; /* Szélesebb form konténer */
            max-width: 800px;
            min-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
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

        @media screen and (max-width: 768px) {
            .form-container {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <table>
            <tr>
                <th>Felhasználónév</th>
                <th>Player 1 Pontszám</th>
                <th>Player 2 Pontszám</th>
            </tr>
            <?php
            // Ha vannak regisztrált felhasználók, akkor kiírjuk az adataikat
            if ($rows) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['felhasznalonev']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['player1_score'] ?? '0') . "</td>";
                    echo "<td>" . htmlspecialchars($row['player2_score'] ?? '0') . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <a class="back-button" href="index.php">Vissza</a>
    </div>
</body>
</html>
<?php
} catch (PDOException $e) {
    // Hibakezelés, ha probléma merül fel a lekérdezés során
    echo "Hiba történt a pontok lekérése közben: " . $e->getMessage();
    http_response_code(500);
}
?>
