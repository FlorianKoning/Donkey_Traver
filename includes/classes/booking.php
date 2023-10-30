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
    public function getDatum($klantenID) {
        $sql = "SELECT startDatum FROM bookingen WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[$klantenID];
    }

    public function getPinCode($klantenID) {
        $sql = "SELECT pinCode FROM bookingen WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute[$klantenID];

        if ($row = $stmt->fetch()) {
            $this->pinCode = $row['pinCode'];
        }
    }

    public function read($klantenID) {
        $sql = "SELECT * FROM bookingen WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$klantenID]);
        
        if ($row = $stmt->fetch()) {
            echo "boeking id: " .  $row['ID'] . "<br>";
            echo "start datum: " . $row['startDatum'] . "<br>";
            echo "tochen id: " . $row['tochtenID'] . "<br>";
            echo "klanten id: " . $row['klantenID'];
        }
    }

    public function create($startDatum, $pinCode, $klantenID) {
        $sql = "INSERT INTO boekingen( startDatum, pinCode, klantenID) VALUES ( ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$startDatum, $pinCode, $klantenID]);
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

    public function readTabelID($klantenID) {
        $sql = "SELECT * FROM boekingen WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$klantenID]);

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

    public function searchPincode($klantenID) {
        $sql = "SELECT pinCode FROM boekingen WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$klantenID]);

        if ($row = $stmt->fetch()) {
            echo $row['pinCode'];
        }
    }

    public function searchTabel($klantenID) {
        $sql = "SELECT * FROM boekingen WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$klantenID]);

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

    public function update($datum, $pincode, $klantenID) {
        $sql = "UPDATE boekingen SET startDatum = ?, pinCode = ? WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$datum, $pincode, $klantenID]);

        if ($stmt) {
            echo 'Je boeking is bij gewerkt';
        } else {
            echo "Er is iets fout gegaan, kon de boeking niet bijwerken!";
        }
    }

    public function delete($klantenID) {
        $sql = "DELETE  FROM `boekingen` WHERE klantenID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$klantenID]);

        if ($stmt) {
            echo 'Je boeking is verwijderd';
        } else {
            echo "Er is iets fout gegaan, kon de boeking niet verwijderen!";
        }
    }


    

} 