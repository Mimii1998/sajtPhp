<?php
if(isset($_POST['status'])){
    include "../config/konekcija.php";
    $status=$_POST['status'];
    $id=1;
    $upit="UPDATE anketa SET aktivna=$status WHERE id=$id";
    $priprema = $konekcija->prepare($upit);
    $rezultat = $priprema->execute();
    if($rezultat){
        echo"ss";
    }else{
        echo"sssfs";
    }

}else{
    header("Location: ../index.php");
}