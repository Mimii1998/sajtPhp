<?php
session_start();
require_once "../config/konekcija.php";
if (isset($_SESSION["korisnik"]) && $_SESSION["korisnik"]->id_uloga == 2) {
    if (isset($_POST["unesi"])) {
        $naziv    = $_POST["naziv"];
        $godina   = $_POST["godina"];
        $opis     = $_POST["opis"];
        $katId    = $_POST["listaKategorija"];
        $istaknut = $_POST["istaknut"];
        
        
        $slika        = $_FILES["slika"];
        $slikaName    = $slika["name"];
        $slikaTmpName = $slika["tmp_name"];
        $slikaSize    = $slika["size"];
        $slikaError   = $_FILES["slika"]["error"];
        $slikaType    = $slika["type"];
        
        $slikaExp        = explode('.', $slikaName);
        $slikaEkstenzija = strtolower(end($slikaExp));
        
        $dozvoljeno = array(
            'jpg',
            'jpeg',
            'png',
            'pdf'
        );
        if (in_array($slikaEkstenzija, $dozvoljeno)) {
            if ($slikaError === 0) {
                $slikaFolder = "assets/images/" . $slikaName;
                move_uploaded_file($slikaTmpName, $slikaFolder);
                $upit     = "INSERT INTO album (naziv, godina, slika, opis, istaknut, id_kategorija)
                            VALUES (:naziv, :godina, :slika, :opis, :istaknut, :katId)";
                $priprema = $konekcija->prepare($upit);
                $priprema->bindParam(':naziv', $naziv);
                $priprema->bindParam(':godina', $godina);
                $priprema->bindParam(':slika', $slikaFolder);
                $priprema->bindParam(':opis', $opis);
                $priprema->bindParam(':istaknut', $istaknut);
                $priprema->bindParam(':katId', $katId);
                
                $rezultat = $priprema->execute();
                header("Location: ../admin.php");
            }
        }
    }
} else {
    header("Location: ../index.php");
}