<?php
include "../config/konekcija.php";

header('Content-Type: application/json');

$rezultat=$konekcija->query("SELECT aktivna from anketa where id=1")->fetch();

echo json_encode($rezultat);