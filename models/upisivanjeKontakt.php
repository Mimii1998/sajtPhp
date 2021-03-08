<?php
require_once "../config/konekcija.php";
if(isset($_POST['text'])){
    $ime=$_POST['name'];
    $email=$_POST['email'];
    $telefon=$_POST['phone'];
    $poruka=$_POST['text'];
	$vremeSlanja = date("Y-m-d H:i:s", time());

    $validno=true;
    $reName="/^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})+$/";
    $rePhone ="/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";
    $reText = "/^[a-zA-Z0-9_ ]{2,}$/";

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validno=false;
    }

    if(!preg_match($reName, $ime)){
        $validno=false;
    }
    if(!preg_match($rePhone, $telefon)){
        $validno=false;
    }
    if(!preg_match($reText, $poruka)){
        $validno=false;
    }

    if($validno){
        $upit="INSERT INTO kontakt (imePrezime, email, telefon, poruka, datum_slanja)
		VALUES (:imePrezime, :email, :telefon, :poruka, :datum_slanja)";
		$priprema = $konekcija->prepare($upit);
		$priprema->bindParam(':imePrezime', $ime);
		$priprema->bindParam(':email', $email);
		$priprema->bindParam(':telefon', $telefon);
		$priprema->bindParam(':poruka', $poruka);
		$priprema->bindParam(':datum_slanja', $vremeSlanja);
		$rezultat = $priprema->execute();	
    }else{
        echo "ne radi";
    }

}else{
    header("Location: ../index.php");
}