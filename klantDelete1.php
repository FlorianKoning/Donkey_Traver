<?php 
session_start();

$_SESSION["naam"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Weet u het zeker?</title>
</head>
<body>
<header>

</header>

<main>
    <div>
        <h1>Wilt u uw account verwijderen</h1>
        <?php
        // naam uit de session halen
        $klantNaam = $_SESSION["naam"];

        // klant gegevens uit de tabel halen
        require_once "Klant.php";
        
        $klant = new Klant();
        $klant->searchKlantNaam($klantNaam);
        $klant->afdrukkenKlant();

        ?>

        <form action='klantDelete2.php' method='post'>
            <input type='hidden' name='naamvak' value='<?php echo $klantNaam; ?>'><br>
            Vul hier uw wachtwoord in voor bevestiging.
            <input type='password' name='wachtwoordvak' required><br><br>
            <input type='submit'>
        </form> 
        <a href="klantlinks.php"><button>Annuleren</button></a>
    </div>
    
</main>
</body>
</html>