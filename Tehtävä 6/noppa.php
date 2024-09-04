<?php include("yla.php"); ?>
<h2>Nopanheitto</h2>
<?php
for ($i = 1; $i <= 6; $i++) {
    $jakauma[$i] = 0;
}
$kerrat = $_GET["kerrat"];
for ($i = 1; $i <= $kerrat; $i++) {
    $heitto = rand(1, 6);
    $jakauma[$heitto]++;
    echo "<img src=\"noppa{$heitto}.png\" alt=\"$heitto\">";
    if ($i % 20 == 0) {
        echo "<br>";
    }
}
echo "<h3>Jakauma</h3>";
echo "<ul>";
for ($i = 1; $i <= 6; $i++) {
    echo "<li>silmäluku {$i} tuli {$jakauma[$i]} kertaa";
}
echo "</ul>";
?>
<?php include("ala.php"); ?>
