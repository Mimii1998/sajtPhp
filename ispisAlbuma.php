<?php

require_once "config/konekcija.php";
$brojPoStrani = 10;
isset($_GET["strana"]) ? $strana=$_GET["strana"] : $strana=0;
$start = 0;
if($strana>0){
    $start=($strana*$brojPoStrani)-$brojPoStrani;
}
else{
	$start=0;
}

if (isset($_GET["kat_id"])) {
    if ($_GET["kat_id"] != 0) {
        $kategorija = "WHERE id_kategorija=".$_GET["kat_id"];
    } else {
        $kategorija = "WHERE 1";
    }
} else {
    $kategorija = "WHERE 1";
}

if (isset($_GET["sort"])) {
    $sort = $_GET["sort"];
    switch ($sort) {
        case 1 : $upit = "SELECT * from album ".$kategorija." ORDER BY godina LIMIT $start,$brojPoStrani";
        break;
        case 2 : $upit = "SELECT * from album ".$kategorija." ORDER BY godina DESC LIMIT $start,$brojPoStrani";
        break;
        case 3 : $upit = "SELECT * from album ".$kategorija." ORDER BY naziv LIMIT $start,$brojPoStrani";
        break;
        case 4 : $upit = "SELECT * from album ".$kategorija." ORDER BY naziv DESC LIMIT $start,$brojPoStrani";
        break;
        default: $upit = "SELECT * from album ".$kategorija." LIMIT $start,$brojPoStrani";
        break;
    }
} else {
    $upit = "SELECT * from album ".$kategorija." LIMIT $start,$brojPoStrani";
}

$rezultat = $konekcija->query($upit, PDO::FETCH_OBJ)->fetchAll();
echo json_encode($rezultat);