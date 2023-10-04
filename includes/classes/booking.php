<?php
// Florian Koning
require 'connect.php';

class Boekingen {
    private $conn;

    public function __construct ($db) {
        $this->conn = $db;
    }

    public function read($ID) {
        $sql = "SELECT * FROM bookingen WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);
        
        if ($row = $stmt->fetch()) {
            echo "boeking id: " .  $row['ID'] . "<br>";
            echo "start datum: " . $row['startDatum'] . "<br>";
            echo "tochen id: " . $row['tochtenID'] . "<br>";
            echo "klanten id: " . $row['klantenID'];
        }
    }

    public function create($startDatum, $pinCode) {
        $sql = "INSERT INTO boekingen( startDatum, pinCode) VALUES ( ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$startDatum, $pinCode]);
        if ($stmt) {
            echo "Gelukt om nieuwe boeking aan te maken!";
        } else {
            echo"Er is iets fout gegaan, kon geen nieuwe boeking aanmaken!";
        }
    }

    public function readTabel() {
        $sql = "SELECT * from boekingen";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        echo "<table class='table'>";
        echo "<tr><th>ID</th><th>Start Datum</th><th>Pin Code</th><th>Tochten ID</th><th>Klanten ID</th></tr><br>";

        while ($row = $stmt->fetch()) { 
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['startDatum'] . "</td>";
            echo "<td>" . $row['pinCode'] . "</td>";
            echo "<td>" . $row['tochtenID'] . "</td>";
            echo "<td>" . $row['klantenID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function search($ID) {
        $sql = "SELECT pinCode FROM boekingen WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);

        if ($row = $stmt->fetch()) {
            echo $row['pinCode'];
        }
    }

    
    

} 