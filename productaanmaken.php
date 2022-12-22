<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<style> 

    .ptoevoegen {
        margin-left: 40%;
    }

</style>
<div class="ptoevoegen">
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
    <input type="submit" name="toevoegen" value="Product toevoegen">
</form>
</div>
 
</body>
</html>