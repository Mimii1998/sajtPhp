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
							    $upit = "SELECT k.id,k.ime,k.prezime,k.id_uloga,u.id as idU, u.naziv,k.email FROM korisnik k inner join uloga u on k.id_uloga=u.id WHERE k.id=$id";
							    $upit2 = "SELECT * FROM uloga";
							    $rezultat2 = $konekcija->query($upit2);
							    $rez2 = $rezultat2->fetchAll();
							    $rezultat = $konekcija->query($upit);
							    $rezKorisnik = $rezultat->fetch();
							    echo "<form action = 'models/izmenaKorisnik.php' method='POST''>
							    <table id='insertTabela'>
							    <tr>
							        <td>Ime</td>
							        <td><input type='text' required value='$rezKorisnik->ime' name='ime'></td>
							    </tr>
							    <tr>
                                    <td>Prezime</td>
                                    <td><input type='text'  required value='$rezKorisnik->prezime' name='prezime'></td>
                                    </tr>
							    <tr>
							        <td>Email</td>
							        <td><input type='email' required name='email' value='$rezKorisnik->email'></td>
							    </tr>
							    <tr>
							        <td>Category</td>
							        <td><select class='listaKategorija' name='uloga'>";
							            $i = 1;
							            foreach($rez2 as $kat){
							                if ($i == $rezKorisnik->id_uloga){
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
                                    <input type='hidden' value='$rezKorisnik->id' name='id'/>
							        <td colspan='2'><button class='submit-btn' type='submit' id='btnIzmena' name='izmeniKorisnika'>Update</button></td>
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