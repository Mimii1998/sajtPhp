<?php
session_start();
include "../config/konekcija.php";
if(isset($_POST['send'])){
	$email = $_POST["email"];
	$sifra = $_POST["lozinka"];
	$siframd5 = md5($sifra);
	$validno = true;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$validno = false; 
	}
	if(empty($sifra)){
		$validno = false;
	}
	if($validno){
		$upit="SELECT * from korisnik where email=:email and lozinka=:sifra";
		$priprema = $konekcija->prepare($upit);
		$priprema->bindParam(":email", $email);
		$priprema->bindParam(":sifra", $siframd5);
		$rezultat = $priprema->execute();
		if($rezultat){
			if($priprema->rowCount()==1){
				$korisnik=$priprema->fetch();
				$_SESSION['korisnik']=$korisnik;
				
				if($korisnik->id_uloga==2){
					header("Location: ../admin.php");
				}else{
					header("Location: ../index.php");
				}
				http_response_code(201);
				echo json_encode($korisnik);
			} else {
				http_response_code(404);
			}
		}
	} else {
		http_response_code(422);
	}
}else{
    header("Location: ../index.php");
}
?>