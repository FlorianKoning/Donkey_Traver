<?php

// Vincent Kroon


// Databasegegevens
$servername = "localhost"; // Naam van de server (meestal localhost)
$username = "root"; // Jouw MySQL-gebruikersnaam
$password = ""; // Jouw MySQL-wachtwoord
$database = "donkey_travel"; // Naam van de database

try {
    // Maak een PDO-verbinding
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Stel de PDO-modus in op uitzonderingen, zodat PDO uitzonderingen genereert bij fouten
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optioneel: Stel de karaktercodering in
    $conn->exec("SET CHARACTER SET utf8");

    // Als de verbinding succesvol is, kun je deze gebruiken voor databasebewerkingen
} catch (PDOException $e) {
    die("Fout bij de verbinding met de database: " . $e->getMessage());
}


// class Database {
//     private $dbConnectie;

//     public function __construct(
//         $IP, $username, $password, $DBname
//     ) {
//         try {
//             $this->dbConnectie = new PDO("mysql:host=". $IP . ";dbname=" . $DBname, $username, $password);
//         } catch(PDOException $e) {
//             die("ERROR!: " . $e->getMessage());
//         }
//     }

//     public function SQLCommando($sqlCommando, $values) {
//         $query = $this->dbConnectie->prepare($sqlCommando);
//         $query->execute($values);
//         return $query->fetchAll(PDO::FETCH_ASSOC);
//     }
// }

