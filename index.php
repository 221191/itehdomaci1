<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Pozoriste</title>
</head>
<body>

<div class="forma">

    <div>
        <h2>Glumac</h2>
        <form action="">

            <hidden id="hiddenid" value=""></hidden>

            <div class="brise-input">
                <input type="text" id="ime" name="ime" required>
                <label for="ime">Ime</label>
                <span class="line"></span>
            </div>
            <div class="brise-input">
                <input type="text" id="prezime" name="prezime" required>
                <label for="prezime">Prezime</label>
                <span class="line"></span>
            </div>
            <div class="izbor select">
                <label for="predstava">Predstava: </label>
                <select name="predstava" id="predstava" id="format">
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
            
            <button id="btn_add" class="btn btn-4 hover-border-6"><span>Sacuvaj</span></button>
            <button id="btn_update" class="btn btn-4 hover-border-6"><span>Izmeni</span></button>

        </form>
    </div>

    <div class="tabela">

            <h4 style="margin-top:20px;">Pretraga: </h4>
            <input type="text" id="searchinput">

            <div id="table">

            </div>
        </div>
</div>


</body>
</html>