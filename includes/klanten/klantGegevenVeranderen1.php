<?php
session_start();

require "../classes/klant.php";

$klant = new Klant($_SESSION["naam"]);
$klant->searchKlantNaam($_SESSION["naam"]);

$_SESSION["id"] = $klant->getKlantID();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Gegevens Veranderen</title>
</head>
<body>
    <main>
        <header>

        </header>

        <div>
            <h1>Welke gegevens wilt u wijzigen?</h1>
            <form action="klantGegevenVeranderen2.php" method="post">
                ID: <?php echo $klant->getKlantID(); ?><br>
                Naam: <input type="text" name="naamvak" value="<?php echo $klant->getKlantNaam()?>" required> <br>
                Email: <input type="email" name="emailvak" value="<?php echo $klant->getKlantEmail()?>" required> <br>
                Telefoon Nr.: <input type="text" name="telefoonvak" maxlength="10" value="<?php echo $klant->getKlantTelefoon()?>" required> <br><br>
                Vul uw wachtwoord in als bevestiging. <br>
                Wachtwoord: <input type="password" name="wachtwoordvak" required><br>
                <input type="submit">
            </form>
            <a href="../../homePagina.php"><button>Annuleren</button></a>
        </div>
        
    </main>
</body>
</html>