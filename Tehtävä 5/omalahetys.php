<?php
$nimi = $_POST["nimi"];
$viesti = $_POST["viesti"];
$miksi = $_POST["miksi"];
$color = $_POST["color"];
$custom_color = $_POST["custom_color"];

if ($color == "eri" && !empty($custom_color)) {
    $color = $custom_color;
}

$vahvistus = isset($_POST["vahvistus"]) ? "Kyllä" : "Ei";

$ok = mail("nadiia.haidash@vuoksi.fi",
           "Palautetta sivustolta",
           "Nimi: $nimi\nViesti: $viesti\nSyy: $miksi\nLempiväri: $color\nPidätkö sivustosta?$vahvistus");
if ($ok) {
    header("Location: omakiitos.php");
} else {
    header("Location: omavirhe.php");
}
?>