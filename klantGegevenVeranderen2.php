<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Verandert</title>
</head>
<body>
<header>
    
</header>

    <main>
        <div>
            <h1>Resultaat</h1>
            <?php
            // klantgegevens uit het formulier halen
            $klantID = $_SESSION["id"];
            $klantNaam = $_POST["naamvak"];
            $klantEmail = $_POST["emailvak"];
            $klantTelefoon = $_POST["telefoonvak"];
            $klantWachtwoord = $_POST["wachtwoordvak"];

            // klant Class aanvragen
            require "klant.php";

            $klant = new Klant($klantNaam, $klantWachtwoord, $klantEmail, $klantTelefoon, $klantID);
            
            $klant->GegevenVeranderenWachtWoordCheck($_SESSION["naam"], $klantWachtwoord, $klantID);
            
            echo "Uw nieuwe gegevens <br>";
            $klant->afdrukkenKlant();

            echo "<br>";
            echo "<button><a href='klantLinks.php'> Terug naar het menu </a></button>";

            $_SESSION["naam"] = $klant->getKlantNaam();
            ?>
        </div>

    </main>
</body>
</html>