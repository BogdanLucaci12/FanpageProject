<?php
$conectare=mysqli_connect("localhost", "root", "", "starwars");
if (!$conectare) {
  die("Conectarea nu a avut succes");
}
?>