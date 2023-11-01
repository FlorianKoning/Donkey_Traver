<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Valentijn Standaart -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Search tocht route stap 2</title>
</head>
<body>
    <main>
        <div>
            <h1>Zoek Tocht Route stap 2</h1>
            <?php
            // tocht route uit het formulier halen
            $tochtRoute = $_POST["tochtroutevak"];

            // supplier gegevens uit  de tabel halen 
            require_once "../classes/tocht.php";  

            $tocht = new Tocht();
            $tocht->searchTochtRoute($tochtRoute);
            $tocht->afdrukkenTocht();

            echo "<button><a href='homePagina.php'> Terug naar het menu </a></button>";

            ?>
        </div>
        
    </main>
</body>
</html>