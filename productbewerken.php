<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product bewerken</title>
</head>

<body>

  <style>
    .ptoevoegen {
      position: absolute;
      text-align: right;
    }
  </style>
  <div class="ptoevoegen">
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
      </fieldset>
    </form>
    <input type="submit" name="toevoegen" value="Product toevoegen">
  </div>

  <style>
    .pverwijderen {
      position: absolute;
      text-align: right;
      margin-top: 11%;
      margin-left: 25%;
    }
  </style>

  <br><br>
  <div class="pverwijderen">
  <h>Apparatuur verwijderen</h>
    <form action="verwerkenverwijderen.php" method="post" id="availability-form">
      <fieldset>
        <span><label>Product ID: </label><input type="text" name="delID" id="delID" required /></span>
        <br>
      </fieldset>
      <input type="submit" name="verwijderen" value="Toewijzen">
    </form>
  </div>
</body>

</html>