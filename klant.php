<?php 

require "connect.php";

// Vincent Kroon

class Klant{
    private int $klantID;
    private string $klantNaam;
    private string $klantEmail;
    private int $klantTelefoon;
    private string $klantWachtwoord;
    private string $klantGewijzigd;

    // wanneer de class wordt aangemaakt met | new Supplier() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($klantNaam="", $klantWachtwoord="", $klantEmail="", $klantTelefoon=0, $klantGewijzigd ="", $klantID=0){
        $this->klantNaam = $klantNaam;
        $this->klantEmail = $klantEmail;
        $this->klantTelefoon = $klantTelefoon;
        $this->klantWachtwoord = $klantWachtwoord;
        $this->klantGewijzigd = $klantGewijzigd;
        $this->klantID = $klantID;
    }

    // Getters
    public function getKlantID(){
        return $this->klantID;
    }
    public function getKlantNaam(){
        return $this->klantNaam;
    }
    public function getKlantEmail(){
        return $this->klantEmail;
    }
    public function getKlantTelefoon(){
        return $this->klantTelefoon;
    }
    public function getKlantWachtwoord(){
        return $this->klantWachtwoord;
    }
    public function getKlantGewijzigd(){
        return $this->klantGewijzigd;
    }

    // Setters
    public function setKlantID($klantID){
        $this->klantID = $klantID;
    }
    public function setKlanNaam($klantNaam){
        $this->klantNaam = $klantNaam;
    }
    public function setKlantEmail($klantEmail){
        $this->klantEmail = $klantEmail;
    }
    public function setKlantTelefoon($klantTelefoon){
        $this->klantTelefoon = $klantTelefoon;
    }
    public function setKlantWachtwoord($klantWachtwoord){
        $this->klantWachtwoord = $klantWachtwoord;
    }
    public function setKlantGewijzigd($klantGewijzigd){
        $this->klantGewijzigd = $klantGewijzigd;
    }

    // CRUD
    public function createKlant(){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","donkey_travel");

        // gegevens in variabelen zetten via de getters
        $klantID = NULL;
        $klantNaam = $this->getKlantNaam();
        $klantEmail = $this->getKlantEmail();
        $klantTelefoon = $this->getKlantTelefoon();
        $klantWachtwoord = $this->getKlantWachtwoord();
        $klantGewijzigd = $this->getKlantGewijzigd();

        // gegevens in de juiste database tabel zetten
        $db->SQLCommando("insert into klanten values 
        (:ID, :naam, :email, :telefoon, :wachtwoord, :gewijzigd)
        ",[
            "ID" => $klantID,
            "naam" => $klantNaam,
            "email" => $klantEmail,
            "telefoon" => $klantTelefoon,
            "wachtwoord" => $klantWachtwoord,
            "gewijzigd" => $klantGewijzigd
        ]);
    }

    public function readKlanten(){
        $db = new Database("localhost","root","","donkey_travel");

        // Alle supplier gegevens in de database opvragen voor elk bestaand supplier ID
        $klantList = $db->SQLCommando("select * from klanten where 1",[]);

        // Alle supplier gegevens laten zien per uniek supplier ID
        foreach($klantList as $klant){
            echo "<div>";
            echo "<p>Klant ID: " . $klant["ID"] . "<br>";
            echo "Naam: " . $klant["naam"] . "<br>";
            echo "Email: " . $klant["email"] . "<br>";
            echo "Telefoon nr.: " . $klant["telefoon"] . "<br>";
            echo "Laatst Gewijzigd: " . $klant["gewijzigd"] . "<br><br>";
            echo "</div><br>";
        }
    }

    public function updateKlant($klantID){
        $db = new Database("localhost","root","","donkey_travel");

        $klantID = $this->getKlantID();
        $klantNaam = $this->getKlantNaam();
        $klantEmail = $this->getKlantEmail();
        $klantTelefoon = $this->getKlantTelefoon();
        $klantWachtwoord = $this->getKlantWachtwoord();
        $klantGewijzigd = $this->getKlantGewijzigd();

        // Veranderen van de gegevens in de database gebaseerd op de gegeven supplier id
        $db->SQLCommando(
        "update klanten set
                ID           = :ID,
                naam         = :naam,
                email        = :email,
                telefoon     = :telefoon,
                wachtwoord   = :wachtwoord,
                gewijzigd    = :gewijzigd
        where   ID = :ID"
        ,[
            "ID" => $klantID,
            "naam" => $klantNaam,
            "email" => $klantEmail,
            "telefoon" => $klantTelefoon,
            "wachtwoord" => $klantWachtwoord,
            "gewijzigd" => $klantGewijzigd
        ]);

        echo "<p>De klant is gewijzigd. <br /></p>";
    }

    public function deleteKlant($klantID){
        $db = new Database("localhost","root","","donkey_travel");
        
        // Checken waar de supplier id in de database overeenkomt met de gegeven supplier id
        $db->SQLCommando("delete from klanten where ID  = :ID", ["ID" => $klantID]);
    }

    public function logInCheckKlant($klantNaam, $klantWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","donkey_travel");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from klanten where naam = :naam", ["naam" => $klantNaam]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            header("Location: http://localhost/Donkey_Traver/index.php");
        } else{
            echo "We hebben u niet gevonden, probeer opnieuw.";
        }
    }
    
    public function searchKlantNaam($klantNaam){
        $db = new Database("localhost","root","","donkey_travel");

        // Zoeken op supplier ID in de database
        $klantList = $db->SQLCommando("select * from klanten where ID = :ID", ["ID" => $klantNaam]);
    
        // supplier gegevens opvragen
        foreach ($klantList as $klant) {
            $this->klantID = $klant["ID"];
            $this->klantNaam = $klant["naam"];
            $this->klantEmail = $klant["email"];
            $this->klantTelefoon = $klant["telefoon"];
            $this->klantWachtwoord = $klant["wachtwoord"];
            $this->klantGewijzigd = $klant["gewijzigd"];
        }
    }

    public function searchKlantEmail($klantEmail){
        $db = new Database("localhost","root","","donkey_travel");

        // checken waar supplier omschrijving in de database overeenkomt met de gegeven adress
        $klantList = $db->SQLCommando("select * from klanten where email = :email", ["email" => $klantEmail]);
    
        // supplier gegevens opvragen
        foreach ($klantList as $klant) {
            $this->klantID = $klant["ID"];
            $this->klantNaam = $klant["naam"];
            $this->klantEmail = $klant["email"];
            $this->klantTelefoon = $klant["telefoon"];
            $this->klantWachtwoord = $klant["wachtwoord"];
            $this->klantGewijzigd = $klant["gewijzigd"];
        }
    }

    // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenKlant(){
        echo "<p>ID: " . $this->getKlantID() . "<br>";
        echo "Naam: " . $this->getKlantNaam() . "<br>";
        echo "Email: " . $this->getKlantEmail() . "<br>";
        echo "Telefoon nr.: " . $this->getKlantTelefoon() . "<br>";
        echo "Gewijzigd: " . $this->getKlantGewijzigd() . "<br><br></p>";
    }
}