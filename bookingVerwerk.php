<?php
//! niet vergeten te mergen met vincent om session naam te krijgen en klant gegevens van Klant.php

session_start();
$_SESSION['naam'] = 'Henk Schuurvrouw';
$_SESSION['email'] = 'henkschruurvrouw@gmail.com';
$ingevoerdePinCode = 0;

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
                            <a class="nav-link active" aria-current="page" href="bookingPage.php">Boeking</a>
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
    } else {
        echo "we hebben geen formulier ontvangen.";
    }

    ?>

    <!-- gegevens van de booking/bonnetje -->
    <main>
        <div class="bookingform">
            <form>
                <div style="border-top: #09a066 10px solid;" class="boekingform">
                    <div style="border-bottom: solid 1px #c7c7c7;">
                        <h2>Uw Boeking Gegevens</h2>
                        <?php
                            echo "<div>";
                            echo "Naam: " . $_SESSION['naam'] ."<br>";
                            echo "Email: " . $_SESSION['email'] . "<br>";
                            echo "geselecteerde route: " . $geselecteerdeRoute . "<br>";
                            echo "geselecteerde datum: " . $geselecteerdeDatum . "<br>";    
                            echo "</div>";
                        ?>
                    </div>
                    <div style="margin-top: 5px;">
                        <h2>Betaling</h2>
                        <label for="exampleInputEmail1" class="form-label">Type hier uw pincode in om de boeking af te ronden.</label>
                        <input type="text" class="form-control" name="pinCode" required>
                        <button style="margin-top: 5px;" type="submit" class="btn btn-primary">Betaling</button>
                    </div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET['pinCode'])) {
                            $ingevoerdePinCode = $_GET['pinCode'];
                        } else {
                            echo "Er is iets fout gegaan, kon pincode niet vinden!";
                        }
    
                        $boeking = new Boekingen($conn);
                        $boeking->create($geselecteerdeDatum, $ingevoerdePinCode);
                    }
                    ?>
                </div>
            </form>
        </div>



    </main>


</body>

</html>
<?php
$conn = NULL;
?>