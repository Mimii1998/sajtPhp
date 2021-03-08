<?php
require_once "config/konekcija.php";

$upit = 'SELECT * FROM izvodjac';
$rezultat = $konekcija->query($upit);

foreach($rezultat as $rez){
    echo "<div class='image group'>
    <div class='grid images_3_of_1'>
        <img src='$rez->slika' alt='$rez->alt'>
    </div>
<div class='grid span_2_of_3'>
    <h3>$rez->ime $rez->prezime</h3>
    <p>$rez->opis</p>
</div>
</div>";
}