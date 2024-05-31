<?php
try {
    $kapcsolat = new PDO('mysql:host=mysql.caesar.elte.hu;dbname=achatiusb', 'achatiusb', 'crVmTQuP6NINK381');
    $kapcsolat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Hiba a kapcsolódás során: " . $e->getMessage());
}
?>
