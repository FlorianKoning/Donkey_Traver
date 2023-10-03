<!-- Florian Koning -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/main.css">
    <title>Booking Page</title>
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
                            <a class="nav-link" aria-current="page" href="bookingOverzicht.php">Boeking Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Donkey's</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- form voor booking gegevens -->
        <div class="bookingform">
            <div class="formboxTop">
                <h2 style="margin-bottom: 30px; border-bottom: 1px #c7c7c7 solid;">Vul de form hier onder in en plan je trip!</h2>
                <P style="color: red;">* betekent dat het moet ingevoerd worden</P>
            </div>
            <form action="bookingVerwerk.php" method="POST">
                <div class="formbox">
                    <div style="margin-bottom: 40px;">
                        <h2 style="margin-bottom: 40px;">Datum Donkey Travel</h2>
                        <label for="exampleInputEmail1" class="form-label">Voer hier de datum in dat je de donkey Travel wilt.<span style="color: red;"> *</span></label>
                        <input type="date" class="form-control" name="startDatum" required>
                    </div>
                </div>
                <div class="formbox">
                    <div style="margin-bottom: 40px;">
                        <h2 style="margin-bottom: 40px;">Alle Routes Die We Hebben</h2>
                        <label for="exampleInputEmail1" class="form-label">Voer hier in welke route u wilt nemen.<span style="color: red;"> *</span></label>
                        <select name="selectRoute" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>Routes die u kunt nemen.</option>
                            <option value="1">Route 1</option>
                            <option value="2">Route 2</option>
                            <option value="3">Route 3</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Aanvragen</button>
                <button type="reset" class="btn btn-primary">Annuleer</button>

            </form>
        </div>
    </main>

</body>

</html>