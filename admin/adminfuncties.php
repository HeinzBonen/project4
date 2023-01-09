<?php

session_start();

include("../db.php");

?>
<title>Beheerders Pagina</title>
<!--navbalk-->
<!--Configuratie HTML, CSS talen-->
<!DOCTYPE html>
<html lang="nl">


<!--Importeren CSS bestand navigatiebalk-->
<link rel="stylesheet" href="../css_bestanden/navbalk.css">

<!--Plaatsen & Configureren van de applicatie balk-->
<div>
    <nav>
        <a class="navloguit" href="../index.php">Log uit</a>
    </nav>
</div>
<br><br><br>
<hr>
<br><br>

</html>
<!--create new admin-->
<body>

<!--div voor links-->
<div style="position: absolute; left: 70%; top: 18%; height: 70%; width: 30%;"> 
<p>Voeg nieuwe beheerder toe:</p>
<form method="POST" name="form1">
    <input required type="email" name="email" placeholder="email-adres..."><br>
    <input required type="password" name="password" placeholder="wachtwoord..."><br>
    <input type="submit" name="nieuweadmin" value="voeg beheerder toe">
</form>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

//hashes password
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


if (strlen($_POST['password']) < 6) {
    //password lenght 
    echo "Wachtwoord moet minstens zes tekens lang zijn!";
    

} else if ($_POST['password'] == "123456") {
    //bad password
    echo "Dat is geen goed wachtwoord...";
    

} else if (isset($_POST['nieuweadmin'])) {
    //puts data into DB
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $insert = $conn->query("
    INSERT INTO
    beheerders
    (
    email,
    wachtwoord
    ) VALUES
    (
    '".$conn->real_escape_string($_POST['email'])."',
    '".$conn->real_escape_string($hash)."'
    )
    ");

    header("Location: admintoegevoegd.php");

    }
}
}
?>
</div>

</body>

<br><p>Wachtwoord opnieuw instellen:</p>
<form method="GET" action="" name= "form2">

<?php
//admin email list
echo "";
$query = "SELECT id,email FROM beheerders ";
if($r_set=$conn->query($query)) {

echo "<SELECT name=email class='form-control' style='width:200px;'>";

while($row=$r_set->fetch_assoc()) {
echo "<option value=$row[id]>$row[email]</option>";
}

echo "</select>";
}else{
echo $conn->error;
}

    ?>

    <br>
    <input type= "password" name="newpassword" placeholder="voer nieuw wachtwoord in"><br>
    <input type= "password" name="verpassword" placeholder="herschrijf wachtwoord"><br>
    <input type= "submit" name= "submit2" value="verander wachtwoord"><br><br><br>
</form>
    <?php
    //rewrites password
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        if(isset($_GET['submit2'])) {

            if(strlen($_GET['newpassword']) < 6) {
                echo "Wachtwoord moet minstens zes tekens lang zijn!";
            }else if($_GET['newpassword'] == $_GET['verpassword']) {
        header("Location: nieuwwachtwoord.php?email=" . $_GET['email'] . "&password=" . $_GET['newpassword']);
    }else{
        echo "Wachtwoorden komen niet overeen...";
    }
}
    }
    ?>

<!--delete admin-->
<p>Verwijder beheerder:</p>
<form method="GET" name="form3">
<?php
//admin email list
echo "";
$query = "SELECT id,email FROM beheerders ";
if($r_set=$conn->query($query)) {

echo "<SELECT name=email class='form-control' style='width:200px;'>";

while($row=$r_set->fetch_assoc()) {
echo "<option value=$row[id]>$row[email]</option>";
}

echo "</select>";
}else{
echo $conn->error;
}

    ?>
<br>
<input type="submit" name= "submit3" value="verwijder beheerder">
</form>
<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['submit3'])) {
    header("Location: verwijder.php?email=" . $_GET['email']);
    }
}
?>  