 <?php
session_start();
$_SESSIONS["naam"];

require '../classes/booking.php';
$db = new Database("localhost", "root", "", "donkey_travel");
$boeking = new Boekingen($db->conn);
$klanten = new Klanten();

//! moet nog ID kunnen krijgen uit een session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Booking Page | Update</title>
</head>
<body>

 <!-- header en nav-bar -->
 <header>
        <nav style="border-bottom: solid 1px #c7c7c7;" class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Donkey Travel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../homePagina.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="bookingPage.php">Boeking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="bookingOverzicht.php">Boeking Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="bookingUpdate.php">Boeking Update</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="bookingVerwijderen.php">Boeking Verwijderen</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
    
        <!-- title van de pagina -->
        <div class="pageTitle">
            <h1>Boeking Overzicht</h1>
        </div>

        <div class="overzichtbox">
            <?php
            $klant->searchKlantNaam($_SESSION["naam"]);


            $boeking->readTabelID($klant->getKlantID());
            ?>     
        </div>
        
    </main>
</body>
</html>