<?php
require_once "config/konekcija.php";

$upit = "SELECT * FROM meni";
$rezultat = $konekcija->query($upit);
foreach($rezultat as $re){
    echo "<li><a href='$re->href'>$re->naziv</a></li>";
}
if(isset($_SESSION['korisnik'])){
	echo "<li><a href='models/logout.php'>Log out</a></li>";
	
	if($_SESSION['korisnik']->id_uloga == 2){
		echo "<li><a href='admin.php'>Admin Panel</a></li>";
	}
}else{
	echo "<li><a href='login.php'>Log in | Registration</a></li>";	
}
?>
