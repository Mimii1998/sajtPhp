<?php
session_start();
require_once "../config/konekcija.php";
if(isset($_SESSION["korisnik"]) AND $_SESSION["korisnik"]->id_uloga == 2 ){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $upit ="DELETE FROM korisnik where id=$id";
        $priprema = $konekcija->prepare($upit);
        $rezultat = $priprema->execute();
        header("Location: ../admin.php");
    }
}
else{
    header("Location: ../index.php");
}