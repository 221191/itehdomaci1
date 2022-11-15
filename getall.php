<table>
    <thead>
        <tr>
            <th id="id" value="desc">ID</th>
            <th id="ime" value="desc">Ime</th>
            <th id="prezime" value="desc">Prezime</th>
            <th id="predstava_id" value="desc">Predstava</th>
            <th id="akcija" value="desc">Akcija</th>
        </tr>
    </thead>

    <tbody>

        <?php

        require "Database.php";
        $db = new Database('pozoriste');

        $query = "select g.id, g.ime, g.prezime, p.naziv from glumac g join predstava p on g.predstava_id=p.id";

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