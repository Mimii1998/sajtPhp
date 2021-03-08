<?php
   $upitStatus = "SELECT * FROM anketa";
   $anketaStatus = $konekcija->query($upitStatus)->fetch();
   if($anketaStatus->aktivna==1){
      if(isset($_SESSION['korisnik'])) {
         $id=$_SESSION['korisnik']->id;
         $upit="SELECT id_korisnika FROM korisnik_odgovor WHERE id_korisnika=$id";
         $rezultat=$konekcija->query($upit);
         $korisnik=$rezultat->fetchAll();
         foreach($korisnik as $k) {
            $idKorisnik=$k->id_korisnika;
         }
         if(!isset($idKorisnik)):?>
         <div id="okvir">
            <div id="anketa">
               <h1>Take Survey</h1>
               <?php
                  $upit = "SELECT * FROM anketa WHERE aktivna = 1";
                  $ankete = $konekcija->query($upit)->fetchAll();
                  foreach($ankete as $anketa):
               ?>
               <div id="pitanje">
                  <p class="que"><?= $anketa->pitanje?></p>
               </div>
               <?php endforeach;?>
               <div id="odgovori">
                  <form method="POST" action="models/anketa.php">
                     <?php
                        $upit="SELECT * FROM odgovor";
                        $rezultat=$konekcija->query($upit);
                        $odgovori=$rezultat->fetchAll();
                        foreach($odgovori as $odg):
                        ?>
                     <div class="polja">
                        <input type="radio" value="<?=$odg->id?>" class="buttons" name="answer"><?=$odg->odg?>
                     </div>
                     <?php endforeach;?>
                     <div class="polja"> 
                        <input type="hidden" id="idK" name="idK" value="<?= $id?>"/>
                        <input type="submit" id="btnAnketa" name="btnAnketa" value="Submit"/>
                     </div>

                  </form>
               </div>
            </div>
         </div>
         <?php endif;?>
         <?php if(isset($idKorisnik)):?>
         <div id="okvir">
            <div id="anketa">
               <h1>Results</h1>
               <div id="pitanje">
                  <?php
                     $upit="SELECT COUNT(id_odgovora) AS br from korisnik_odgovor WHERE
                     id_odgovora=1";
                     $rezultat=$konekcija->query($upit);
                     $upit1="SELECT COUNT(id_odgovora) AS br from korisnik_odgovor WHERE
                     id_odgovora=2";
                     $rezultat1=$konekcija->query($upit1);
                     $upit2="SELECT COUNT(id_odgovora) AS br from korisnik_odgovor WHERE
                     id_odgovora=3";
                     $rezultat2=$konekcija->query($upit2);
                     $upit3="SELECT COUNT(id_odgovora) AS br from korisnik_odgovor WHERE
                     id_odgovora=4";
                     $rezultat3=$konekcija->query($upit3);
                     $upit4="SELECT COUNT(id_odgovora) AS br from korisnik_odgovor WHERE
                     id_odgovora=5";
                     $rezultat4=$konekcija->query($upit4);
                     foreach($rezultat as $odg):
                     foreach($rezultat1 as $odg1):
                     foreach($rezultat2 as $odg2):
                     foreach($rezultat3 as $odg3):
                     foreach($rezultat4 as $odg4):
                     ?>
                  <p class="brojOdgovora">Very bad: <?= $odg->br?></p>
                  <p class="brojOdgovora">Bad: <?= $odg1->br?></p>
                  <p class="brojOdgovora">Good: <?= $odg2->br?></p>
                  <p class="brojOdgovora">Very good: <?= $odg3->br?></p>
                  <p class="brojOdgovora">Excellent: <?= $odg4->br?></p>
                  <?php endforeach;?>
                  <?php endforeach;?>
                  <?php endforeach;?>
                  <?php endforeach;?>
                  <?php endforeach;?>
               </div>
               <div id="odgovori">
            
               </div>
            </div>
         </div>
         <?php endif;
      }
}
   ?>