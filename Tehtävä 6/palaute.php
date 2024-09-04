<?php include("yla.php"); ?>
<h2>Palautelomake</h2>
<form action="lahetys.php" method="post">
  <p>Nimi: <br>
  <input type="text" name="nimi"></p>
  <p>Palaute: <br>
  <textarea name="viesti"></textarea></p>
  <p><input type="submit" value="Lähetä"></p>
</form>
<?php include("ala.php"); ?>
