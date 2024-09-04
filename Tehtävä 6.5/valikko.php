<!-- Multilanguage menu -->
<ul>
  <li><a href="home.php?lang=en">English</a></li>
  <li><a href="home.php?lang=fr">French</a></li>
  <li><a href="home.php?lang=de">German</a></li>
  <li><a href="home.php?lang=es">Spanish</a></li>
</ul>

<!-- Example home.php file -->
<?php

// Get the selected language from the query string
$selectedLang = $_GET['lang'];

// Set the default language to English
$lang = "en";

// Load the selected language file if it exists
if ($selectedLang == "fr") {
  $lang = "fr";
  include "lang/fr.php";
}
else if ($selectedLang == "de") {
  $lang = "de";
  include "lang/de.php";
}
else if ($selectedLang == "es") {
  $lang = "es";
  include "lang/es.php";
}