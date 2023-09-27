<?php
// Florian Koning
require 'connect.php';

class Boeking {
    private $conn;

    public function __construct ($db) {
        $this->conn = $db;
    }

    public function read($ID) {
        $sql = "SELECT * FROM booking WHERE ? = ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ID]);
        
        if ($row = $stmt->fetch()) {
            echo "boeking id: " .  $row['ID'] . "<br>";
            echo "start datum: " . $row['startDatum'] . "<br>";
            echo "tochen id: " . $row['tochtenID'] . "<br>";
            echo "klanten id: " . $row['klantenID'];
        }
    }

    
    

} 