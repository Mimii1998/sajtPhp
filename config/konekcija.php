<?php

 $imeBaze="bazaSajt";
 $server="localhost";
 $username="root";
 $password="";
try{     
    $konekcija = new PDO("mysql:host=$server;dbname=$imeBaze",$username,$password);     
    $konekcija -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);     
    $konekcija -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e){ 
    echo $e->getMessage(); 
}