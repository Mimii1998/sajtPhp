<?php
require_once "../config/konekcija.php";
header("Location: ../index.php");
    if(isset($_POST['btnAnketa'])){
        $answer=$_POST['answer'];
        $idKorisnika=$_POST['idK'];
        echo $answer;
        echo $idKorisnika;
        if($answer==""){
        header("Location: ../index.php");
        }

    $upit="INSERT INTO korisnik_odgovor(id_korisnika,id_odgovora) VALUES(:idK,:idO);";
    $stmt=$konekcija->prepare($upit);
    $stmt->bindParam(":idK",$idKorisnika);
    $stmt->bindParam(":idO",$answer);
    $stmt->execute();
    if($stmt->rowCount()){
        echo "Uspesan unos";
    }
}else{
    header("Location: ../index.php");
}
?>