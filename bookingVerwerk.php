<?php
require 'includes/classes/booking.php';
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/main.css">
    <title>Document</title>
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="bookingPage.php">Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Donkey's</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- php code dat de POST checkt -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // kijkt of er een $_POST verzoek is voor selectroute
        if (isset($_POST["selectRoute"])) {
            $geselecteerdeRoute = $_POST["selectRoute"];
        } else {
            echo "je hebt geen route gekozen!";
        }

        // kijkt of er een $_POST verzoek is voor startdatum
        if (isset($_POST["startDatum"])) {
            $geselecteerdeDatum = $_POST["startDatum"];
        } else {
            echo "je hebt geen datum gekozen!";
        }

        // kijkt of er een $_POST is voor  selectPersonen
        if (isset($_POST["selectPersonen"])) {
            $geselecteerdePersonen = $_POST["selectPersonen"];
        } else {
            echo "je hebt niet aantal personen gekozen!";
        }
    } else {
        echo "we hebben geen formulier ontvangen.";
    }
    ?>

    <!-- gegevens van de booking/bonnetje -->
    <main>
        <div class="bookingform">
            <div class="detailbox">
                <h2 style="margin-top: 10px;">Alle Details Over De Donkey Travel</h2>
                <?php
                echo "geselecteerde route: " . $geselecteerdeRoute . "<br>";
                echo "geselecteerde datum: " . $geselecteerdeDatum . "<br>";
                echo "geselecteerde aantal personen: " . $geselecteerdePersonen . "<br>";
                ?>
            </div>
        </div>
    </main>


</body>

</html>