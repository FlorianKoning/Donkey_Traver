<?php
// Florian Koning
require 'connect.php';

class Boekingen {
    private $conn;
    private int $pinCode;

    public function __construct ($db) {
        $this->conn = $db;
    }

    // alle getters
    public function getDatum($ID) {
        $sql = "SELECT startDatum FROM bookingen WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[$ID];
    }

    public function getPinCode($ID) {
        $sql = "SELECT pinCode FROM bookingen WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[$ID];

        if ($row = $stmt->fetch()) {
            $this->pinCode = $row['pinCode'];
        }
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

        $sql = "SELECT * FROM boekingen";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        echo "<table class='table'>";
        echo "<tr><th style='background-color: green; color: white;'>ID</th><th style='background-color: green; color: white;'>Start Datum</th>
                <th style='background-color: green; color: white;'>Pin Code</th><th style='background-color: green; color: white;'>Tochten ID</th>
                <th style='background-color: green; color: white;'>Klanten ID</th></tr><br>";

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

    public function readTabelID($ID) {
        $sql = "SELECT * FROM boekingen WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);

        echo "<table class='table'>";
        echo "<tr><th style='background-color: green; color: white;'>ID</th><th style='background-color: green; color: white;'>Start Datum</th>
                <th style='background-color: green; color: white;'>Pin Code</th><th style='background-color: green; color: white;'>Tochten ID</th>
                <th style='background-color: green; color: white;'>Klanten ID</th></tr><br>";

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

    public function searchPincode($ID) {
        $sql = "SELECT pinCode FROM boekingen WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);

        if ($row = $stmt->fetch()) {
            echo $row['pinCode'];
        }
    }

    public function searchTabel($ID) {
        $sql = "SELECT * FROM boekingen WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);

        echo "<table class='table'>";
        echo "<tr><th style='background-color: green; color: white;'>ID</th><th style='background-color: green; color: white;'>Start Datum</th>
                <th style='background-color: green; color: white;'>Pin Code</th><th style='background-color: green; color: white;'>Tochten ID</th>
                <th style='background-color: green; color: white;'>Klanten ID</th></tr><br>";

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

    public function update($datum, $pincode, $ID) {
        $sql = "UPDATE boekingen SET startDatum = ?, pinCode = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$datum, $pincode, $ID]);

        if ($stmt) {
            echo 'Je boeking is bij gewerkt';
        } else {
            echo "Er is iets fout gegaan, kon de boeking niet bijwerken!";
        }
    }

    public function delete($ID) {
        $sql = "DELETE  FROM `boekingen` WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);

        if ($stmt) {
            echo 'Je boeking is verwijderd';
        } else {
            echo "Er is iets fout gegaan, kon de boeking niet verwijderen!";
        }
    }


    

} 