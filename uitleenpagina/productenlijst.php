<?php

session_start();
include("../db.php");

?>
<title>Uitleenbeheer</title>

<fieldset>
    <div style="text-align:justify; margin-right: 3px;">
    <span>
    <p>Beschikbare producten:</p>
    <h>naam</p>
    <p>merk</p>
    <p>serie nr.</p>
    <p>type</p>
    <p>staat</p>
    <p>status</p>
</div>
</fieldset>


<?php

$query = "SELECT id,pnaam,pmerk,pserienummer,ptype,pstaat,pstatus FROM producten";
if($r_set=$conn->query($query)) {

    echo "<list name=producten class='form-control' style='width:auto;'>";

    while($row=$r_set->fetch_assoc()) {
    echo "<fieldset><option value='".$row['id']."'>".$row['pnaam']." - ".$row['pmerk']." - ".$row['pserienummer']." - ".$row['ptype']." - ".$row['pstaat']." - ".$row['pstatus']."</option></fieldset>";
    }
    
    echo "</list>";


}

