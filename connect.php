<?php 

// Vincent Kroon

class Database{
    private $dbConnectie;

    public function __construct(
        $IP, $username, $password, $DBName
    ){
        // Connectie maken met de database
        try {
            $this->dbConnectie = new PDO("mysql:host=". $IP . ";dbname=". $DBName, 
            $username, $password);
        } catch(PDOException $e){
            die("Error!: " . $e->getMessage());
        }
    }

    // Commando voor sql code. Geen SQL injection met dit
    public function SQLCommando($sqlCommando, $values){
        $query = $this->dbConnectie->prepare($sqlCommando);
        $query->execute($values);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>