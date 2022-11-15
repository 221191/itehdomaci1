<?php

include 'Database.php';
include 'Glumac.php';
$db = new Database('pozoriste');

$id = $_POST['id'];

$query = "select * from glumac where id=" . $id;

$result = $db->conn->query($query);

while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $predstava_id = $row['predstava_id'];

    $glumac = new Glumac($id, $ime, $prezime, $predstava_id);
}

echo json_encode($glumac);
