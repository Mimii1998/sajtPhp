<?php
require_once "config/konekcija.php";
$upit = "SELECT * FROM album WHERE istaknut = 1";
$rezultat = $konekcija->query($upit);


foreach ($rezultat as $rez){
    echo "<div class='grid_1_of_3 images_1_of_3'>    
    <img src='$rez->slika' alt='$rez->alt' />


    <h3>$rez->naziv</h3>

<span class='godina'>
    <sup>Year: $rez->godina</sup>
</span>
";
if(isset($_SESSION['korisnik'])){
echo"<div class='btn'>
    <a href='details.php?id=$rez->id' data-id=$rez->id class='showMore'>Show more</a>
</div>
</div>"; 
} else {
    echo"<div class='btn'>
    <a href='login.php' data-id=$rez->id class='showMore'>Show more</a>
</div>
</div>";
}

}