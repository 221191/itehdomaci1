<?php

require "Database.php";
$db = new Database('pozoriste');

$id = $_POST['id'];
$poredak = $_POST['poredak'];

?>

<table>
    <thead>
        <tr>
    <th id="id" value="<?php
                        if ($id != 'id') {
                            echo 'desc';
                        } else {
                            if ($poredak == 'asc') {
                                echo 'desc';
                            } else {
                                echo 'asc';
                            }
                        }
                        ?>">ID</th>
    <th id="ime" value="<?php if ($id != 'ime') {
                            echo 'desc';
                        } else {
                            if ($poredak == 'asc') {
                                echo 'desc';
                            } else {
                                echo 'asc';
                            }
                        }
                        ?>">Ime</th>
    <th id="prezime" value="<?php if ($id != 'prezime') {
                                echo 'desc';
                            } else {
                                if ($poredak == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                }
                            }
                            ?>">Prezime</th>
    <th id="predstava_id" value="<?php if ($id != 'predstava_id') {
                                    echo 'desc';
                                } else {
                                    if ($poredak == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    }
                                }
                                ?>">Predstava</th>
    <th id="akcija">Akcija</th>
    </tr>
    </thead>

    <tbody>
        <?php

        $query = "select g.id, g.ime, g.prezime, p.naziv from glumac g join predstava p on g.predstava_id=p.id order by " . $id . " " . $poredak . "";
        $result = $db->conn->query($query);

        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <tr class="text-center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ime'];  ?></td>
                <td><?php echo $row['prezime'];  ?></td>
                <td><?php echo $row['naziv']; ?></td>
                <td>
                    <button id="btn_edit" value="<?php echo $row['id'] ?>">Izmeni</button>
                    <button id="btn_delete" value="<?php echo $row['id'] ?>">Obriši</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>

</table>