<?php

include 'Database.php';
$db = new Database('pozoriste');

$id = $_POST['id'];

$query = "delete from glumac where id=" . $id;

if ($db->conn->query($query)) {
    echo 'Glumac je obrisan!';
} else {
    echo 'Glumac nije obrisan!';
}
