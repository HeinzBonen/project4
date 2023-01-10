<?php

session_start();
//database connectie
include("../db.php");



?>
<!doctype html>
<html>
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="https://icons.iconarchive.com/icons/shek0101/blue/128/blue-computer-icon.png">


   <link rel="stylesheet" href="../css_bestanden/navbalk.css">
   <link rel="stylesheet" href="../css_bestanden/uitlenen.css">

     <title>Uitlenen</title>

 </head>
 <body>


   <table style="width: 40%; max-width: 40%; background-color: Moccasin;">
     <tr style="background-color: gray;"><th>Naam</th> <th>Merk</th> <th>Type</th> <th>Serienummer</th> <th>Staat</th></tr>
   <?php
   //admin email list
   $query = "SELECT pnaam, pmerk, pserienummer, ptype, pstaat, pstatus FROM producten ";
   if($r_set=$conn->query($query)) {

   while($row=$r_set->fetch_assoc()) {
     if($row["pstatus"] == "Beschikbaar"){
     echo "<tr><th>$row[pnaam]</th> <th>$row[pmerk]</th> <th>$row[ptype]</th> <th>$row[pserienummer]</th> <th>$row[pstaat]</th></tr>";
   }
  }
   }else{
   echo $conn->error;

   }
   ?>
 </table>
 </body>
</html>
