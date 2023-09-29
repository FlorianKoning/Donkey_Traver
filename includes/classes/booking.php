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

    
    

} 