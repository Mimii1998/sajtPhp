<?php
session_start();
require_once "config/konekcija.php";
if (!isset($_SESSION["korisnik"])) {
    header("Location: index.php");
} else {
    if ($_SESSION["korisnik"]->id_uloga == 1) {
        header("Location: index.php");
    }
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($_POST["izmeni"])) {
        $naziv  = $_POST["naziv"];
        $godina = $_POST["godina"];
        $katId  = $_POST["listaKategorija"];
        $tekst  = $_POST["opis"];
        
        if (isset($_FILES["slika"])) {
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
                    $upit     = "UPDATE album 
                SET naziv='$naziv', opis='$tekst', godina='$godina', slika='$slikaFolder', id_kategorija='$katId' where id='$id'";
                    $priprema = $konekcija->prepare($upit);
                    $rezultat = $priprema->execute();
                    header("Location: admin.php");   
                }
            }            
            else {
                $upit = "UPDATE album 
                SET naziv='$naziv', opis='$tekst', godina='$godina', id_kategorija='$katId' where id='$id'";
                $priprema = $konekcija->prepare($upit);
                $rezultat = $priprema->execute();
                header("Location: admin.php");
            } 
        }
    }
}
?>
<?php
	include "pages/head.php";
	include "pages/header.php";
?>
	<div class="slider-bg slider2">
		<h2 class="sliderText2">Edit</h2>
	</div>
		<div class="content-bg">
			<div class="wrap">
				<div class="page">
					<div id="izmeniAlbum">
						<?php
							if(isset($_GET["id"])){
							    $id = $_GET["id"];
							    $upit = "SELECT * FROM album WHERE id=$id";
							    $upit2 = "SELECT * FROM kategorija";
							    $rezultat2 = $konekcija->query($upit2);
							    $rez2 = $rezultat2->fetchAll();
							    $rezultat = $konekcija->query($upit);
							    $rez = $rezultat->fetch();
							    echo "<form action = 'izmeni.php?id=$id' method='POST' enctype='multipart/form-data'>
							    <table id='insertTabela'>
							    <tr>
							        <td>Name</td>
							        <td><input type='text' pattern='^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$' required title='Example: Herald' value='$rez->naziv' name='naziv'></td>
							    </tr>
							    <tr>
							        <td>Description</td>
							        <td><input type='text' title='Tell us something about your Album.'  name='opis' value='$rez->opis'></td>
							    </tr>
							    <tr>
							        <td>Year</td>
							        <td><input type='text' pattern='^[1-9]{1}[0-9]{2,3}$' title='Example: 1998' required name='godina' value='$rez->godina'></td>
							    </tr>
							    <tr>
							        <td>Image</td>
							        <td><input type='file' name='slika'/></td>
							    </tr>
							    <tr>
							        <td>Category</td>
							        <td><select class='listaKategorija' name='listaKategorija'>";
							            $i = 1;
							            foreach($rez2 as $kat){
							                if ($i == $rez->id_kategorija){
							                    echo "<option value='$kat->id' selected='$i'>$kat->naziv</option>";
							                } else {
							                    echo "<option value=$kat->id>$kat->naziv</option>";
							                }
							                $i++;
							            }
							            echo "</select>
							            </td>
							    </tr>
							    <tr>
							        <td colspan='2'><button class='submit-btn' type='submit' id='btnIzmena' name='izmeni'>Update</button></td>
							    </tr>
							    </table>
							    </form>";
							}
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