<?php
require_once("animal.php");
require_once("frog.php");
require_once("ape.php");
$sheep = new Animal("shaun");

echo "Name : " . $sheep->name . "<br>"; // "shaun"
echo "Legs : " . $sheep->legs . "<br>"; // 4
echo "Cold Blooded : " . $sheep->cold_blooded . "<br>" . "<br>"; // "no"

$kodok = new frog("buduk");
echo "Name : " . $kodok->name . "<br>";
echo "Legs : " . $kodok->legs . "<br>";
echo "Cold Blooded : " . $kodok-> cold_blooded . "<br>";
echo "Jump : " . $kodok->jump() . "<br>" . "<br>";

$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "<br>";
echo "Legs : " . $sungokong->legs . "<br>";
echo "Cold Blooded : " . $sungokong-> cold_blooded . "<br>";
echo "Yell : " . $sungokong->yell(); // "Auooo"
?>