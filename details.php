<?php
	session_start();
	include "pages/head.php";
	include "pages/header.php";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $upit="SELECT * from album where id=$id";
        $rezultat = $konekcija->query($upit);
        $rez = $rezultat->fetch();
    }else{
        header("Location: specials.php");
    }
?>
</div>
</div>
<div class="slider-bg slider2">
	<h2 class="sliderText2"><?php echo$rez->naziv;?></h2>
</div>
<div class="content-bg">
<div class="wrap">
<div class="page">
	<div id="detalji">
        <?php
                echo "
                    <p class='nazivAlbum'>$rez->naziv</p></br></br>
                    <img class='slikaAlbum' src='$rez->slika' alt='$rez->alt' /></br></br>
                    <p class='godinaAlbum'>Year: $rez->godina </p></br></br>
                    <p class='opisAlbum'>$rez->opis</p></br></br>
                ";
        ?>        
        <div class="cleaner"></div>
    </div>
</div>
</div>
</div>
<div class="footer-bg">
	<?php
		include "pages/footer.php";
	?>
	</div>
</body>
</html>