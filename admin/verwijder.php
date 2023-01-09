<?php

session_start();

include("../db.php");

$id = $_GET['email'];
$sql = "SELECT id , email FROM beheerders WHERE id=$id";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    //echo "id: " . $row["id"] . "email: " . $email. "<br>"; 
  }
} else {
  echo "0 results";
}
?>
<title>verifieer keuze</title>
<p>Weet u zeker dat u de gebruiker <?php print_r($email);?> wilt verwijderen?</p>
<form name="janee" method="POST">
    <input type="submit" value="Ja" name="ja">
    <input type="submit" value="Nee" name="nee">

    <?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['ja']){
        //delete admin
            $sql = "DELETE FROM beheerders WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
            echo "Beheerder is verwijderd";
            header("Location:adminfuncties.php");
            } else {
            echo "Er is een fout opgetreden, probeer het opnieuw. " . $conn->error;
            }

            $conn->close();

    }elseif($_POST['nee']){
        //return to adminfuncties
        echo "koe";
    }
}

