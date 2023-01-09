<?php

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
<title> wachtwoord vernieuwd </title><br>
<?php

//hashes new password
$hash = password_hash($_GET['password'], PASSWORD_DEFAULT);

//changes old password into new password
$sql = "UPDATE beheerders SET wachtwoord='$hash' WHERE id=$id";



if ($conn->query($sql) === TRUE) {
  echo "het wachtwoord van $email is veranderd naar $_GET[password].<br><a href=adminfuncties.php>terug naar beheerders pagina</a>";
} else {
  echo "Error; het wachtwoord kon niet bijgewerkt worden: <br><a href=adminfuncties.php>terug naar beheerders pagina</a>" . $conn->error;
}

$conn->close();