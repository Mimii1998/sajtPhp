<?php
    session_start();
    require_once "config/konekcija.php";
    if(!isset($_SESSION["korisnik"])){
        header("location: index.php");       
    } else{
        if($_SESSION["korisnik"]->id_uloga == 1){
            header("location: index.php");
            }
    }
?>
<?php
	include "pages/head.php";
	include "pages/header.php";
?>
	<div class="slider-bg slider2">
		<h2 class="sliderText2">admin</h2>
	</div>
        <div class="content-bg">
            <div class="wrap">
                <div class="main">
                    <div class="content">
                        <h2>Albums</h2>
                                <table class="tabela">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Image</th>
                                        <th>CategoryId</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                        $upit = "SELECT * FROM album";
                                        $rezultat = $konekcija->query($upit);
                                        foreach($rezultat as $album){
                                            echo "<tr>
                                            <td class='tabelaIdAlbuma'>$album->id</td>
                                            <td class='tabelaNazivAlbuma'>$album->naziv</td>
                                            <td class='tabelaGodinaAlbuma'>$album->godina</td>
                                            <td class='tabelaPutanjaSlikeAlbuma'>$album->slika</td>
                                            <td class='tabelaKategodijaAlbuma'>$album->id_kategorija</td>
                                            <td class='taster'><a href='izmeni.php?id=$album->id'><button class='submit-btn' type='submit' name='izmeni'>Update</button></a></td>
                                            <td class='taster'><a href='models/izbrisi.php?id=$album->id'><button class='submit-btn delete' type='submit' name='izbrisi'>Delete</button></a></td>
                                            </tr>";
                                        }
                                    ?>
                                </table>  
                                <h2>New album</h2>   
                                <form action="models/unesi.php" name="formaDodaj"  method="POST" enctype="multipart/form-data">
                                <table id="insertTabela">
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" required pattern="^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$" title="Example: Herald" id="tbNazivAlbuma" name="naziv"></td>
                                    </tr>
                                    <tr>
                                        <td>Year:</td>
                                        <td><input type="text" required pattern="^[1-9]{1}[0-9]{2,3}$" title="Example: 1998" id="tbGodinaAlbuma" name="godina"></td>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td><input type="text" required  title="Tell us something about your Album." id="tbOpisAlbuma" name="opis"></td>
                                    </tr>
                                    <tr>
                                        <td>Featured:</td>
                                        <td><input type="text" required pattern="^[0-1]{1}$" title="0 OR 1" id="tbIstaknut" name="istaknut"></td>
                                    </tr>    
                                    <tr>
                                        <td>Image:</td>
                                        <td><input type="file" id="slika" required name="slika"></td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td><select class='listaKategorija' id="ddlKategorija" name='listaKategorija'>
                                        <?php
                                        $upit2 = "SELECT * FROM kategorija";
                                        $rezultat2 = $konekcija->query($upit2);
                                        $rez2 = $rezultat2->fetchAll();
                                        foreach($rez2 as $kat){
                                            echo "<option value=$kat->id>$kat->naziv</option>";
                                        }
                                        ?>
                                         </select>
                                        </td>
                                    </tr>
                                    <tr> 
                                        <td colspan="2"><input class="submit-btn" id='btnIzmena' value="Insert" type="submit" name="unesi"></td>
                                    </tr>   
                                    </table>  
                                    </form>
                                    <h2>Users</h2>
                                    <table class="tabela">
                                        <tr>
                                            <th>Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Date Of Registration</th>
                                            <th>Uloga</th>
                                            <th>Update</th>
                                            <th class="taster">Delete</th>
                                        </tr>
                                        <?php 
                                        $upit3 = "SELECT k.id,k.ime,k.prezime,k.email,k.datum_registracije,u.naziv FROM korisnik k INNER JOIN uloga u ON k.id_uloga=u.id";
                                        $rezultat3 = $konekcija->query($upit3);
                                        foreach($rezultat3 as $kor){
                                            echo "<tr>
                                            <td>$kor->id</td>
                                            <td>$kor->ime</td>
                                            <td>$kor->prezime</td>
                                            <td>$kor->email</td>
                                            <td>$kor->datum_registracije</td>
                                            <td>$kor->naziv</td>
                                            <td class='taster'><a href='izmenaKorisnika.php?id=$kor->id'><button class='submit-btn' type='submit' name='izbrisiKorisnike'>Update</button></a></td>
                                            <td class='taster'><a href='models/izbrisiKorisnike.php?id=$kor->id'><button class='submit-btn delete' type='submit' name='izbrisiKorisnike'>Delete</button></a></td>
                                            </tr>";
                                        }
                                        ?>
                                    </table>  
                                    <h2>Contact Results</h2>
                                    <table class="tabela">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Text</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php 
                                        $upit5 = "SELECT id,imePrezime, email, telefon, poruka FROM kontakt";
                                        $rezultat5 = $konekcija->query($upit5);
                                        foreach($rezultat5 as $kontakt){
                                            echo "<tr>
                                            <td>$kontakt->id</td>
                                            <td>$kontakt->imePrezime</td>
                                            <td>$kontakt->email</td>
                                            <td>$kontakt->telefon</td>
                                            <td>$kontakt->poruka</td>
                                            <td class='taster'><a class='submit-btn delete' href='models/izbrisiKontakt.php?id=$kontakt->id'>Delete</a></td>
                                            </tr>";
                                        }
                                        ?>
                                    </table>

                                    <h2>Survey Results</h2>
                                    <span id="pollStatus"></span><div class="status submit-btn" data-id="1">Active</div><div class="status submit-btn delete" data-id="0">Deactive</div>
                                    <table class="tabela">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Answer</th>
                                        </tr>
                                        <?php 
                                        $upit4 = "SELECT k.ime as ime, k.prezime as prezime, o.odg as odgovor From korisnik k inner join korisnik_odgovor ko ON k.id = ko.id_korisnika INNER join odgovor o ON ko.id_odgovora = o.id";
                                        $rezultat4 = $konekcija->query($upit4);
                                        foreach($rezultat4 as $ank){
                                            echo "<tr>
                                            <td>$ank->ime</td>
                                            <td>$ank->prezime</td>
                                            <td>$ank->odgovor</td>
                                            </tr>";
                                        }
                                        ?>
                                    </table>

                            </div>
                    <div class="sidebar">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="footer-bg">
            <?php
                include "pages/footer.php"
                ?>
        </div>
    </body>
    <script src="assets/js/admin.js" type="text/javascript"></script>
</html>