<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vincent Kroon -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="">
    <title>Read Klant</title>
    <style>
        table, th, td {
            border: 2px solid lightgray;
            border-collapse: collapse;
        }

        table{
            width: 90%;
            margin: auto;
            margin-top: 50px;
        }

        .idhead{
            padding: 6px;
            background-color: green;
            color: white;
        }

        .naamhead, .emailhead, .telefoonhead, .gewijzigdhead{
            padding-left: 8px;
            padding-right: 30px;
            padding-bottom: 20px;
            padding-top: 20px;
            background-color: green;
            color: white;
        }

        .idrow{
            padding: 6px;
        }

        .naamrow, .emailrow, .telefoonrow, .gewijzigdrow{
            padding-left: 8px;
            padding-right: 30px;
            padding-bottom: 20px;
            padding-top: 20px;
        }

        tr:nth-child(even) {
            background-color: whitesmoke;
        }

    </style>
</head>
<body>
    <main>
        <div>
            <h1>Tabel met Huidige Klanten</h1>

            <button><a href='klantLinks.php'> Terug naar het menu </a></button><br><br>
            <?php
            require_once "klant.php";

            $klant = new Klant();
            $klant->readKlanten();
            
            ?>
        </div>
    
    </main>
</body>
</html>