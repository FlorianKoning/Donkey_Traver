<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>
    <header>

    </header>
    <main>
        <div>
            <h1>Gefeliciteerd</h1>
            <?php
            require_once "Klant.php";

            $klantID = NULL;
            $klantNaam = $_POST ["naamvak"];
            $klantEmail = $_POST ["emailvak"];
            $klantTelefoon = $_POST ["telefoonvak"];
            $klantWachtwoord = $_POST ["wachtwoordvak"];

            $klantWWHash = password_hash($klantWachtwoord, NULL);

            // klant gegevens invoeren
            $klant = new Klant($klantNaam, $klantWWHash, $klantEmail, $klantTelefoon);
            
            // klant in de database zetten
            $klant->createKlant();
            echo "<p>Uw account is toegevoegd</p><br>";
            ?>
        </div>
        
    </main>
    <footer>

    </footer>
</body>
</html>