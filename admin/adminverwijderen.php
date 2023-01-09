<?php

session_start();

include("../db.php");
?>
<!--delete admin-->
<p>verwijder beheerder:</p>
<form method="GET" name="verwijderadmin">
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
<br><br>
<input type="submit" name= "verwijderadmin" value="verwijder">

<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['verwijderadmin']){
    header("Location: verwijder.php?email=" . $_GET['email']);
    }
}