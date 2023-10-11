<?php 

require_once "connect.php";

// Vincent Kroon

class Klant{
    private int $klantID;
    private string $klantNaam;
    private string $klantEmail;
    private string $klantTelefoon;
    private string $klantWachtwoord;
    private string $klantGewijzigd;

    // wanneer de class wordt aangemaakt met | new Supplier() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($klantNaam="", $klantWachtwoord="", $klantEmail="", $klantTelefoon="", $klantGewijzigd ="", $klantID=0){
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
        $klantGewijzigd = NULL;

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

        // Alle klanten gegevens in de database opvragen
        $klantList = $db->SQLCommando("select * from klanten where 1",[]);

        echo "<table>"; 
        echo "<th>ID</th>";
        echo "<th>Naam</th>";
        echo "<th>Email</th>";
        echo "<th>Telefoon nummer</th>";
        echo "<th>Laatst gewijzigd</th>";
        echo "</tr>";

        // Alle klanten gegevens laten zien
        foreach($klantList as $klant){
            echo "<tr>";
            echo "<td>" . $klant["ID"] . "</td>";
            echo "<td>" . $klant["naam"] . "</td>";
            echo "<td>" . $klant["email"] . "</td>";
            echo "<td>" . $klant["telefoon"] . "</td>";
            echo "<td>" . $klant["gewijzigd"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function updateKlant($klantID){
        $db = new Database("localhost","root","","donkey_travel");

        $klantID = $this->getKlantID();
        $klantNaam = $this->getKlantNaam();
        $klantEmail = $this->getKlantEmail();
        $klantTelefoon = $this->getKlantTelefoon();
        $klantWachtwoord = $this->getKlantWachtwoord();
        $klantGewijzigd = NULL;

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
    }

    public function deleteKlant($klantNaam){
        $db = new Database("localhost","root","","donkey_travel");
        
        // Checken waar de supplier id in de database overeenkomt met de gegeven supplier id
        $db->SQLCommando("delete from klanten where naam  = :naam", ["naam" => $klantNaam]);
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
            header("Location: http://localhost/Donkey_Traver/klantLinks.php");
        } else{
            echo "We hebben u niet gevonden, probeer opnieuw.";
        }
    }

    public function GegevenVeranderenWachtWoordCheck($klantNaam, $klantWachtwoord, $klantID){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","donkey_travel");

        $HashedWachtwoord = "";

        $logins = $db->SQLCommando("select * from klanten where naam = :naam", ["naam" => $klantNaam]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            $this->klantWachtwoord = $HashedWachtwoord;
            $this->klantID = $klantID;
            $this->updateKlant($this->klantID);
        } else{
            echo "Verkeerd wachtwoord ingevoerd, probeer opnieuw.";
        }
    }

    public function VerwijderCheck($klantNaam, $klantWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","donkey_travel");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from klanten where naam = :naam", ["naam" => $klantNaam]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            return true;
        } else{
            return false;
        }
    }
    
    public function searchKlantNaam($klantNaam){
        $db = new Database("localhost","root","","donkey_travel");

        // Zoeken op supplier ID in de database
        $klantList = $db->SQLCommando("select * from klanten where naam = :naam", ["naam" => $klantNaam]);
    
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
            $this->klantGewijzigd = $klant["gewijzigd"];
        }
    }

    // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenKlant(){
        echo "<p>ID: " . $this->getKlantID() . "<br>";
        echo "Naam: " . $this->getKlantNaam() . "<br>";
        echo "Email: " . $this->getKlantEmail() . "<br>";
        echo "Telefoon Nr. : " . $this->getKlantTelefoon() . "<br><br>";
        //echo "Gewijzigd: " . $this->getKlantGewijzigd() . "<br><br></p>";
    }
}