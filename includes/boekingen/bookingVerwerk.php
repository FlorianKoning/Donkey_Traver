<!-- Florian Koning -->

<?php
session_start();
$_SESSION['naam'];

require '../classes/booking.php';
require '../classes/klant.php';

$klant = new Klant();
$klant->searchKlantNaam($_SESSION["naam"]);

$klantNaam = $klant->getKlantNaam();
$klantEmail = $klant->getKlantEmail();
$ingevoerdePinCode = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Booking verwerk</title>
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
                            <a class="nav-link active" aria-current="page" href="bookingPage.php">Boeking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="bookingUpdate.php">Boeking Verwijderen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Donkey's</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- gegevens van de booking/bonnetje -->
    <main>
        <div class="bookingform">
            <form>
                <div style="border-top: #09a066 10px solid;" class="boekingform">
                    <div style="border-bottom: solid 1px #c7c7c7;">
                        <h2>Uw Boeking Gegevens</h2>
                        <?php
                            echo "<div>";
                            echo "Naam: " . $klantNaam ."<br>";
                            echo "Email: " . $klantEmail . "<br>";
                            echo "geselecteerde route: " . $_SESSION['selectRoute'] . "<br>";
                            echo "geselecteerde datum: " . $_SESSION['startDatum'] . "<br>";    
                            echo "</div>";
                        ?>
                    </div>
                    <div style="margin-top: 5px;">
                        <h2>Betaling</h2>
                        <label for="exampleInputEmail1" class="form-label">Type hier uw pincode in om de boeking af te ronden.</label>
                        <input type="number" class="form-control" name="pinCode" required>
                        <button style="margin-top: 5px;" type="submit" class="btn btn-primary">Betaling</button>
                    </div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET['pinCode'])) {
                            $ingevoerdePinCode = $_GET['pinCode'];

                            if (strlen($ingevoerdePinCode) > 4) {
                                echo 'Pincode is te lang.';
                            } else if (strlen($ingevoerdePinCode) < 4) {
                                echo 'Pincode is te kort.';
                            } else {
                                $db = new Database("localhost", "root", "", "donkey_travel");
                                $boeking = new Boekingen($db->conn);
                    
                                $boeking->create($_SESSION['startDatum'], $ingevoerdePinCode);
                            }
                        } else if ($ingevoerdePinCode != 0) {
                            echo "pincode nog niet ingevoerd of niet gevonden.";
                        }
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