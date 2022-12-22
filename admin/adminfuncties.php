<?php

session_start();

include("../db.php");

?>
<title>beheerders pagina</title>
<!--create new admin-->
<p>voeg nieuwe beheerder toe:</p>
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
    exit();

} else if ($_POST['password'] == "123456") {
    //bad password
    echo "Dat is geen goed wachtwoord...";
    exit();

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
    <input type= "submit" name= "submit2" value="verander wachtwoord">

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