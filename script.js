$(document).ready(function () {
    vratiSveGlumce();
    dodajNovogGlumca();
    obrisiGlumca();
    popuniFormu();
    sacuvajIzmenjenogGlumca();
    pretraziGlumce();
    sortirajGlumce();
})

function vratiSveGlumce() {

    $.ajax(
        {
            url: 'getall.php',
            method: 'get',
            success: function (data) {
                $('#table').html(data);
            }
        }

    )
}

function dodajNovogGlumca() {

    $(document).on('click', '#btn_add', function () {

        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let predstava = $('#predstava').val();

        if (ime == '' || prezime == '' ||  predstava == '') {
            alert('Neophodno je da popunite polja!');
            return;
        }

        $.ajax({
            url: 'add.php',
            method: 'post',
            data: { ime: ime, prezime: prezime, predstava: predstava },

            success: function (data) {
                alert(data);
                vratiSveGlumce();
                $('#ime').val('');
                $('#prezime').val('');
                $('#predstava').val(1);
            }
        })
    })

}

function obrisiGlumca() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                alert(data);
                vratiSveGlumce();
            }
        })
    })
}

function popuniFormu() {

    $(document).on('click', '#btn_edit', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'edit.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                $('#hiddenid').val(data.id);
                $('#ime').val(data.ime);
                $('#prezime').val(data.prezime);
                $('#predstava').val(data.predstava_id);
                $('#btn_add').hide();
                $('#btn_update').show();
            }
        })
    })
}

function sacuvajIzmenjenogGlumca() {

    $(document).on('click', '#btn_update', function () {

        let id = $('#hiddenid').val();
        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let predstava_id = $('#predstava').val();

        $.ajax({
            url: 'update.php',
            method: 'post',
            data: { id: id, ime: ime, prezime: prezime, predstava_id: predstava_id },

            success: function (data) {
                alert(data);
                vratiSveGlumce();
            }
        })

    })
}

function pretraziGlumce() {

    $(document).on('keydown', '#searchinput', function () {

        let input = this.value;

        $.ajax(
            {
                url: 'getallSearch.php',
                method: 'post',
                data: { input: input },
                success: function (data) {
                    {
                        $('#table').html(data);
                    }
                }
            }
        )
    })
}

function sortirajGlumce() {

    $(document).on('click', 'th', function () {

        let id = $(this).attr('id');
        let poredak = $(this).attr('value');


        if (id == 'akcija') {
            alert('Ova kolona se ne moze sortirati!');
            return;
        }

        $.ajax({
            url: 'getallSort.php',
            method: 'post',
            data: { id: id, poredak: poredak },

            success: function (data) {
                $('#table').html(data);
            }
        })

    })
}

