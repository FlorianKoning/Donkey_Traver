<?php 
require "connect.php";

// Valentijn Standaart

class Tocht{
    public int $tochtID;
    public string $tochtOmschrijving;
    public string $tochtRoute   ;
    public int $tochtDagen;

    // wanneer de class wordt aangemaakt met | new Tocht() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($tochtOmschrijving="", $tochtRoute="", $tochtDagen=0, $tochtID=0){
        $this->tochtOmschrijving = $tochtOmschrijving;
        $this->tochtRoute = $tochtRoute;
        $this->tochtDagen = $tochtDagen;
        $this->tochtID = $tochtID;
    }

    // Getters
    public function getTochtID(){
        return $this->tochtID;
    }
    public function getTochtOmschrijving(){
        return $this->tochtOmschrijving;
    }
    public function getTochtRoute(){
        return $this->tochtRoute;
    }
    public function getTochtDagen(){
        return $this->tochtDagen;
    }

    // Setters
    public function setTochtID($tochtID){
        $this->tochtID = $tochtID;
    }
    public function setTochtOmschrijving($tochtOmschrijving){
        $this->tochtOmschrijving = $tochtOmschrijving;
    }
    public function setTochtRoute($tochtRoute){
        $this->tochtRoute = $tochtRoute;
    }
    public function setTochtDagen($tochtDagen){
        $this->tochtDagen = $tochtDagen;
    }
    
    // CRUD
    public function createTocht(){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","donkey_travel");

        // gegevens in variabelen zetten via de getters
        $tochtID = NULL; // wordt automatische aangemaakt door de database
        $tochtOmschrijving = $this->getTochtOmschrijving();
        $tochtRoute = $this->getTochtRoute();
        $tochtDagen = $this->getTochtDagen();

        // gegevens in de juiste database tabel zetten
        $db->SQLCommando("insert into tochten values 
        (:tochtID, :tochtOmschrijving, :tochtRoute, :tochtDagen)
        ", [
            "tochtID" => $tochtID,
            "tochtOmschrijving" => $tochtOmschrijving,
            "tochtRoute" => $tochtRoute,
            "tochtDagen" => $tochtDagen,
        ]);
    }

    public function readTocht(){
        $db = new Database("localhost","root","","donkey_travel");

        // Alle klant gegevens in de database opvragen voor elk bestaand tocht ID
        $tochtlijst = $db->SQLCommando("select * from tochten where 1",[]);

        foreach($tochtlijst as $tocht){
            echo "<p>Tocht ID: " . $tocht["ID"] . "<br>";
            echo "Tocht omschrijving: " . $tocht["omschrijving"] . "<br>";
            echo "Tocht route: " . $tocht["route"] . "<br>";
            echo "Tocht aantal dagen: " . $tocht["aantalDagen"] . "<br></p>";
        }
    }

    public function updateTocht($tochtID){
        $db = new Database("localhost","root","","donkey_travel");
        $tochtOmschrijving = $this->getTochtOmschrijving();
        $tochtRoute = $this->getTochtRoute();
        $tochtDagen = $this->getTochtDagen();

        // Veranderen van de gegevens in de database gebaseerd op de gegeven tocht id
        $db->SQLCommando(
        "update artikelen set
                omschrijvingng   = :tochtOmschrijving,
                route            = :tochtRoute,
                aantalDagen      = :tochtDagen,
        where   ID = :ID"
        ,[
            "ID" => $tochtID,
            "omschrijvingng" => $tochtOmschrijving,
            "route" => $tochtRoute,
            "aantalDagen" => $tochtDagen,
        ]);

        echo "<p>De tocht is gewijzigd. <br /></p>";
    }

    public function deleteTocht($tochtID){
        $db = new Database("localhost","root","","donkey_travel");
        
        // Checken waar de artikel id in de database overeenkomt met de gegeven artikel id
        $db->SQLCommando("delete from tochten where ID  = :tochtID", ["ID" => $tochtID]);
    }
    
    public function searchTochtRoute($tochtID){
        $db = new Database("localhost","root","","donkey_travel");

        // Zoeken op tocht ID in de database
        $artikelen = $db->SQLCommando("select * from tochten where ID = :tochtID", ["ID" => $tochtID]);
    
        // artikel gegevens opvragen
        foreach ($tochten as $tocht) {
            $this->tochtID = $tocht["tochtID"];
            $this->tochtOmschrijving = $tocht["tochtOmschrijving"];
            $this->tochtRoute = $tocht["tochtRoute"];
            $this->tochtDagen = $tocht["tochtDagen"];
        }
    }

     // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenTocht(){
            echo "<p>Tocht ID: " . $this->getTochtID() . "<br>";
            echo "Tocht omschrijving: " . $this->getTochtOmschrijving() . "<br>";
            echo "Tocht route " . $this->getTochtRoute() . "<br>";
            echo "Tocht dagen: " . $this->getTochtDagen() . "<br></p>";
        }
}