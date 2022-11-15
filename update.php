<?php

require 'Database.php';
require 'Glumac.php';
$db = new Database('pozoriste');

$id = $_POST['id'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$predstava_id = $_POST['predstava_id'];

$glumac = new Glumac($id, $ime, $prezime, $predstava_id);

$query = "update glumac set ime='" . $glumac->ime . "', prezime='" . $glumac->prezime . "
', predstava_id='" . $glumac->predstava_id . "' where id=" . $glumac->id;

if ($db->conn->query($query)) {
    echo 'Glumac je izmenjen!';
} else {
    echo 'Glumac nije izmenjen!';
}
