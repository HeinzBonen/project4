<?php


if (isset($_POST["verwijderen"])) {
    // echo "1";
    if (!empty($_POST["delID"])) {
        //   echo "2";

        $delID= $_POST['delID'];
    }
}


//Connectie bouwen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uitleenbeheer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleren connection
if ($conn->connect_error) {
    die("Connection failure: " . $conn->connect_error);
}

// Wijzigen database
$sql = "DELETE FROM producten WHERE ID='$delID'";

// echo $sql;

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>