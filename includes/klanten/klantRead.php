<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Read Klant</title>
</head>
<body>
    <main>
        <div>
            <h1>Tabel met Huidige Klanten</h1>

            <button><a href='../../homePagina.php'> Terug naar het menu </a></button><br><br>
            <?php
            require_once "../classes/klant.php";

            $klant = new Klant();
            $klant->readKlanten();
            
            ?>
        </div>
    
    </main>
</body>
</html>