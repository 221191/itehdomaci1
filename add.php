<?php

require 'Database.php';
require 'Glumac.php';
$db = new Database('pozoriste');

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$predstava_id = $_POST['predstava'];

$glumac = new Glumac(NULL, $ime, $prezime, $predstava_id);

$query = "insert into glumac values (NULL, '$glumac->ime', '$glumac->prezime', '$glumac->predstava_id')";

if ($db->conn->query($query)) {
    echo 'Glumac je sacuvan!';
} else {
    echo 'Glumac nije sacuvan!';
}
?>