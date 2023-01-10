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
<div style="position: absolute; left: 70%; top: 18%; height: auto; width: 29%; border-radius:2px; border: 2px solid black;"> 
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

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product bewerken</title>
</head>

<body>

  <div>
  <h>Apparatuur toevoegen</h>
    <form action="verwerken.php" method="post" id="availability-form">
      <fieldset>
        <span><label>Product naam: </label><input type="text" name="pnaam" id="pnaam" required /></span>
        <br>
      </fieldset>
      <fieldset>
        <span><label>Product merk: </label><input type="text" name="pmerk" id="pmerk" required /></span>
        <br>
      </fieldset>
      <fieldset>
        <span><label>Product serienummer </label><input type="text" name="pserienummer" id="pserienummer" required /></span>
        <br>
      </fieldset>
      <fieldset>
        <span><label>Product type: </label><input type="text" name="ptype" id="ptype" required /></span>
        <br>
      </fieldset>
      <fieldset>
        <span><label>Product staat: </label><input type="text" name="pstaat" id="pstaat" required /></span>
        <br>
      </fieldset>
        <!--select photo-->
      <fieldset>
        <span><label>(optioneel)Foto product: </label><select name="pfoto" id="pfoto" onchange="fotofunctie()">
            <option value="">- selecteer -</option>
            <?php
            $fileList = glob('../fotos/*');
            foreach($fileList as $filename){
                if(is_file($filename)){
                    echo '<option>'; echo substr($filename, 9); echo'</option>'; 
                }   
            }
            ?>        
        </option>
            </select>
            <p id="demo"></p>

            <script>
                function fotofunctie() {
                var x = document.getElementById("pfoto").value;
                document.getElementById("demo").innerHTML = "You selected: " + x;
                }
            </script>

        </span>
        <br>
      </fieldset>

      <fieldset>
        <span>
          <label>Product Status</label>
          <select name="pstatus" id="pstatus" required>
            <option value="">- selecteer -</option>
            <option>Beschikbaar</option>
            <option>Niet beschikbaar</option>
            <option>Reparatie - Niet beschikbaar</option>
          </select>
        </span>
        <br><br>
    </form>
    <input type="submit" name="toevoegen" value="Product toevoegen">
  </div>
  
  <h>Apparatuur verwijderen</h>
  <div>
  <form action="verwerkenverwijderen.php" method="post" id="availability-form">
    <fieldset>
      <span><label>Product ID: </label><input type="text" name="delID" id="delID" required /></span>
      <br>
    </fieldset>
    <input type="submit" name="verwijderen" value="Toewijzen">
  </form>
  </div>
</body>


</div>

</body>

<div style="position: absolute; top: 18%; height: auto; width: 29%; border-radius:2px; border: 2px solid black;"> 
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
</div>