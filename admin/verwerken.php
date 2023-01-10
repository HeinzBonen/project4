<?php

// OPVANG DATA VERWERKEN

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["pnaam"])) {
        //   echo "2";

        $pnaam = $_POST['pnaam'];
    }
}

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["pmerk"])) {
        //   echo "2";

        $pmerk = $_POST['pmerk'];
    }
}

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["pserienummer"])) {
        //   echo "2";

        $pserienummer = $_POST['pserienummer'];
    }
}

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["ptype"])) {
        //   echo "2";

        $ptype = $_POST['ptype'];
    }
}

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["pstaat"])) {
        //   echo "2";

        $pstaat = $_POST['pstaat'];
    }
}

if (isset($_POST["toevoegen"])) {
    // echo "1";
    if (!empty($_POST["pstatus"])) {
        //   echo "2";

        $pstatus = $_POST['pstatus'];
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uitleenbeheer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failure: " . $conn->connect_error);
}

$sql = "INSERT INTO `producten` (`pnaam`, `pmerk`, `pserienummer`, `ptype`, `pstaat`, `pstatus`)
VALUES ('$pnaam', '$pmerk', '$pserienummer', '$ptype', '$pstaat', '$pstatus')";

// $sql = "INSERT INTO `test`(`Naam`) VALUES ('TEST')";

// echo $sql;

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registratie</title>
</head>

<body>

    <style>
        .succes {
            position: absolute;
            color: greenyellow;
            margin-top: 5%;
            background-color: green;
            padding: 5%;
            border-radius: 5%;
            margin-left: 5%;
        }
    </style>


    <div class="succes">
        <h>Het volgende product is succesvol toegevoegd aan de database:</h>
        <p>Naam: <?php echo $pnaam; ?></p>
        <p>Merk: <?php echo $pmerk; ?></p>
        <p>Serienummer: <?php echo $pserienummer; ?></p>
        <p>Type: <?php echo $ptype; ?></p>
        <p>Staat: <?php echo $pstaat; ?></p>
    </div>
</body>

</html>