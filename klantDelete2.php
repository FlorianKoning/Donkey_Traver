<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Delete Supplier 3</title>
</head>
<body>
<header>
    
</header>

<main>
    <div>
        <h1>Verwijderen</h1>
        <?php 
        // gegevens uit het formulier halen
        $klantNaam = $_POST["naamvak"];
        $klantWachtwoord = $_POST["wachtwoordvak"];

        require_once "Klant.php";
        $klant = new Klant();

        // supplier gegevens verwijderen
        if ($klant->VerwijderCheck($klantNaam, $klantWachtwoord) == true){
            $klant->deleteKlant($klantNaam);
            echo "<p>De gegevens zijn verwijderd. <br></p>";
        }
        else{
            echo "<p>De gegevens zijn niet verwijderd. <br></p>";
        }

        echo "<br>";
        echo "<button><a href='klantLinks.php'>Terug</a></button>";
        ?>
    </div>
    
</main>
</body>
</html>