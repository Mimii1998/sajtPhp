<?php
session_start();
include "../config/konekcija.php";
if(isset($_POST["send"])) {
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
	$sifra = $_POST["sifra"];
	$vremeReg = date("Y-m-d H:i:s", time());
	$siframd5 = md5($sifra);
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
	if(empty($sifra)){
		$validno = false;
	}
	if($validno){
		$upit="INSERT INTO korisnik (ime, prezime, email, lozinka, datum_registracije , id_uloga)
		VALUES (:ime, :prezime, :email, :sifra, :datum_registracije, '1')";
		$priprema = $konekcija->prepare($upit);
		$priprema->bindParam(':ime', $ime);
		$priprema->bindParam(':prezime', $prezime);
		$priprema->bindParam(':email', $email);
		$priprema->bindParam(':sifra', $siframd5);
		$priprema->bindParam(':datum_registracije', $vremeReg);
		$rezultat = $priprema->execute();

		if($rezultat){
			$korisnik=$konekcija->query("SELECT * from korisnik where email='$email' and lozinka='$siframd5' ")->fetch();
			$_SESSION['korisnik']=$korisnik;

			if($korisnik->id_uloga==2){
				header("Location: ../admin.php");
			}else{
				header("Location: ../index.php");
			}
		}else{
			header("Location: ../index.php");
		}
		
	}
	
}else{
	header("Location: ../index.php");
}
?>