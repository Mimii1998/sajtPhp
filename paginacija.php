<?php
require_once "config/konekcija.php";
$brojPoStrani = 10;
if (isset($_GET["kat_id"])) {
    $kategorija = $_GET["kat_id"];

    $countUpit = "SELECT COUNT(*) AS brojAlbuma from album WHERE id_kategorija = ".$kategorija;
    $priprema = $konekcija->prepare($countUpit);

    $rezultatCount = $konekcija->query($countUpit)->fetch();
    $brojRez = $rezultatCount->brojAlbuma;
    $ukupno = ceil($brojRez / $brojPoStrani);

} else {
    $countUpit = "SELECT COUNT(*) AS brojAlbuma from album";
    $rezultatCount = $konekcija->query($countUpit)->fetch();
    $brojRez = $rezultatCount->brojAlbuma;
    $ukupno = ($brojRez / $brojPoStrani);
}

echo "<ul id='stilPaginacija'>";
	for($i=1;$i<$ukupno+1;$i++){
		echo "<li><a class='pag' data-id='$i' href='specials.php?strana=$i'>$i</a></li> ";
	}
	echo "</ul>";