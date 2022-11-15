<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozoriste</title>
</head>
<body>
<div class="container">

<div class="forma">

    <div >
        <h2>Glumac</h2>
        <form action="">

            <hidden id="hiddenid" value=""></hidden>

            <div>
                <label for="ime">Ime: </label>
                <input type="text" id="ime" name="ime">
            </div>
            <div>
                <label for="prezime">Prezime: </label>
                <input type="text" id="prezime" name="prezime">
            </div>
            <div>
                <label for="predstava">Predstava: </label>
                <select name="predstava" id="predstava">
                    <?php

                    include 'Database.php';
                    $db = new Database('pozoriste');

                    $query = "select * from predstava";
                    $result = $db->conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['naziv']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <button id="btn_add">Sačuvaj</button>
            <button id="btn_update">Izmeni</button>

        </form>
    </div>

</div>




</body>
</html>