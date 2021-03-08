<?php
session_start();
if(isset($_POST['izmeniKorisnika'])){
    require_once "../config/konekcija.php";
    $ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
    $id=$_POST["id"];
    $idUloga=$_POST["uloga"];

    $reIme =  "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";
	$rePrezime =  "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";

    $validno = true;
	if(!preg_match($reIme, $ime)){
		$validno = false;
	}
	if(!preg_match($rePrezime, $prezime)){
		$validno = false;
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$validno = false; 
	}
    if($validno){
		$rezultat = $konekcija->query("UPDATE korisnik set ime='$ime', prezime='$prezime', email='$email', id_uloga=$idUloga WHERE id=$id");
        if($rezultat){
            header("Location: ../izmenaKorisnika.php?id=$id");
        }else{
            header("Location: ../admin.php");
        }
    }
}else{
    header("Location: ../index.php");
}