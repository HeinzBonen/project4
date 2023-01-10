<?php

session_start();
//database connectie
include("../db.php");

$query = "SELECT pnaam, pmerk, pserienummer, ptype, pstaat, pstatus FROM producten ";

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
   <div style="z-index: 2; position: fixed; width: 100%; background-color: PapayaWhip;">
       <nav>
           <a class="navloguit" href="/">Log uit</a>
       </nav>
        <br><br><br>
        <hr>
   </div>

   <div style="float: right; padding: 4%; margin-right: 10%; margin-top: 5%; border-style: solid;" >
     <h3>Uitlenen Producten</h3>
     <br>
     <form action="index.html" method="post">
       <label for="serienummer">Serienummer product:</label><br>
         <input type="text" id="serienummer" name="serienummer" placeholder="MB3453s234" value=""><br>
         <label for="studentnummer">Studentnummer:</label><br>
         <input type="text" id="studentnummer" name="studentnummer" placeholder="278556" value=""><br><br>
         <input type="submit" value="Submit">
     </form>
   </div>

   <table style="left: 0; top: 10%; width: 30%; max-width: 30%; ">
     <tr class="top"><th>Beschikbare Producten</th></tr>
     <tr class="top"><th>Naam</th> <th>Merk</th> <th>Type</th> <th>Serienummer</th> <th>Staat</th></tr>
   <?php
   //admin email list

   if($r_set=$conn->query($query)) {

   while($row=$r_set->fetch_assoc()) {
     if($row["pstatus"] == "Beschikbaar"){
     echo "<tr><th>$row[pnaam]</th> <th>$row[pmerk]</th> <th>$row[ptype]</th> <th>$row[pserienummer]</th> <th>$row[pstaat]</th></tr>";
   }
  }
   }
   ?>












      <table style="right: 26%; top: 55%; width: 20%; max-width: 20%;">
        <tr class="top"><th>Uitgeleende Producten</th></tr>
        <tr class="top"><th>Naam</th> <th>Merk</th> <th>Type</th> <th>Serienummer</th></tr>
      <?php
      //admin email list

      if($r_set=$conn->query($query)) {

      while($row=$r_set->fetch_assoc()) {
        if($row["pstatus"] == "uitgeleend"){
        echo "<tr><th>$row[pnaam]</th> <th>$row[pmerk]</th> <th>$row[ptype]</th> <th>$row[pserienummer]</th></tr>";
      }
     }
      }
      ?>
 </table>

 <table style="right: 1%; top: 55%; width: 15%; max-width: 15%;">
   <tr class="top"><th>Uitgeleende Producten</th></tr>
   <tr class="top"><th>Leerlingnummer</th> <th>Naam</th> <th>Type</th></tr>
 <?php
 //admin email list

 if($r_set=$conn->query($query)) {

 while($row=$r_set->fetch_assoc()) {
   if($row["pstatus"] == "Beschikbaar"){
   echo "<tr><th>$row[pnaam]</th> <th>$row[pmerk]</th> <th>$row[ptype]</th></tr>";
 }
}
 }
 ?>
</table>

 </body>
</html>
