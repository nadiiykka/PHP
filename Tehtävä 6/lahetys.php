<?php
$nimi = $_POST["nimi"];
$viesti = $_POST["viesti"];
$ok = mail("nadiia.haidash@vuoksi.fi",
           "Palaute",
           "Nimi: $nimi\nViesti: $viesti");
if ($ok) {
    header("Location: kiitos.php");
} else {
    header("Location: virhe.php");
}
?>
